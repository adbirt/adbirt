/**
 * Advertiser script for Adbirt Advertiser
 */
(() => {
    class AdbirtAdvertiser {
        /**
         * Endpoint to be called to charge an advertiser when a campaign is consumed
         */
        url = "https://adbirt.com/campaigns/verified";
        /**
         * Current campaign code to take action on
         */
        camp_code = '';
        /**
         * Whether or not the current webpage is a valid campaign page
         */
        isCampaignPage = false;
        /**
         * Request payload
         */
        params = new URLSearchParams;
        /**
         * Key for holding data in browser storage
         */
        #storageKey = 'adbirt_camp_code';
        /**
         * URL object for the current page url
         */
        currentPageUrl = new URL(window.location.href);

        // --

        constructor() {
            console.log('Constructed');
            this.params = this.currentPageUrl.searchParams;

            this.camp_code = this.params.get('camp_code');
            this.isCampaignPage = (this.camp_code) ? true : false;

            if (!this.camp_code) {
                const tmp = window.localStorage.getItem(this.#storageKey);
                if (tmp) {
                    this.camp_code = tmp;
                } else {
                    this.camp_code = '';
                }
            }

            this.autoPilot();

            return this;
        }

        // --

        async autoPilot() {
            if (this.camp_code) {
                console.log('adbirt auto pilot');
                for (const mode of ['landing', 'success']) {
                    console.log(`For ${mode}`);
                    const newUrl = this.currentPageUrl;
                    newUrl.searchParams.delete('camp_code');
                    const req_url_encoded = encodeURIComponent(newUrl.toString());

                    const res = await fetch(`https://adbirt.com/api/check-if-url-is-valid-campaign?url_in_question=${req_url_encoded}&url_type=${mode}&code=${this.camp_code}`);
                    console.log(`Response for ${mode} is: `, res);
                    const json = await res.json();
                    console.log(`json for ${mode}: `, json);

                    const is_valid = json['is_valid'];
                    console.log(is_valid);

                    if (is_valid) {
                        console.log(`${mode} is valid`);
                        this.actionMap(mode);
                    } else {
                        // not a campaign page
                    }
                }
            } else {
                this.noCampaignSpecified();
            }
        }

        async actionMap(mode) {
            console.log(`adbirt action map ${mode}`);
            const map = {
                'landing': async () => await this.redirectFormSubmitInit(),
                'success': async () => await this.redirectFormSubmit()
            }

            return await map[mode]();
        }

        // --

        /**
         * @note Primary function 1
         */
        async redirectFormSubmitInit() {
            if (this.isCampaignPage) {
                try {
                    window.localStorage.setItem(this.#storageKey, this.camp_code);
                    console.log('adbirt campaign init');
                } catch (error) {
                    console.error(error);
                }
            } else {
                this.noCampaignSpecified();
            }
        }

        /**
         * @note Primary function 2 
         */
        async redirectFormSubmit() {
            try {
                if (this.camp_code) {
                    //make request to backend with token to check valid or not 
                    const formUrlParams = new URLSearchParams();
                    formUrlParams.append('campaign_code', this.camp_code);
                    try {
                        const res = await this.makeApiCall(formUrlParams, 'Campaign Consumed');
                        window.localStorage.removeItem(this.#storageKey);
                        console.log('adbirt campaign submit');

                        return res;
                    } catch (err) {
                        console.log(err);
                        // window.localStorage.removeItem('camp_code');
                        // if request failed, dont charge teh advertiser, just return
                        return err;
                    }
                }
            } catch (error) {
                return error;
            }
        }

        // --

        async asyncFormSubmit() {
            await this.redirectFormSubmitInit();
            return await this.redirectFormSubmit();
        }

        // --

        async paymentPageInit() {
            return await this.redirectFormSubmitInit();
        }

        async paymentSuccessPageConsume() {
            return await this.redirectFormSubmit();
        }

        // --


        async download(id) {
            const element = document.getElementById(id);

            element.addEventListener('click', async () => {
                await this.redirectFormSubmitInit();
                return await this.redirectFormSubmit();
            });
        }

        async clickAction(id) {
            return await this.download(id);
        }

        // --

        /**
         * Makes an api call to adbirt backend
         * @param {URLSearchParams} reqBody The request body
         * @param {string} msg An alert message
         * @returns {Promise}
         */
        async makeApiCall(reqBody, msg) {
            try {
                const res = await fetch(this.url, {
                    method: "POST",
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: reqBody
                });

                const json = await res.json();
                console.log(json);

                return json;
            } catch (error) {
                return error;
            }
        }

        // --

        noCampaignSpecified() {
            console.log('No campaign specified');
        }
    }

    /**
     * Kickstart the script
     */
    try {
        console.log('Kickstart');
        const AB = new AdbirtAdvertiser;

        if (window.AB) {
            window._Adbirt = AB;
        } else {
            window.AB = AB;
        }

        window.adbirtNoConflict = () => {
            return AB;
        }
    } catch (err) {
        console.log(err);
    }
})();