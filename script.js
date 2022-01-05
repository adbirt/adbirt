(() => {

    const campaign_types = Object.freeze({
        CPA: 'CPA',
        CPC: 'CPC',
        NATIVE_CONTENT_AD: 'Native Content Ad',
    });

    const banner_types = Object.freeze({
        IMG: 'image',
        VID: 'video'
    });


    /**
     * @type {HTMLSelectElement}
     */
    const campaign_type_selector = document.querySelector('#campaign_type');
    /**
     * @type {HTMLInputElement}
     */
    const successPageinputField = document.querySelector("#campaign_success_url");
    /**
     * @type {HTMLDivElement}
     */
    const successPageInputContainer = document.querySelector("#myform > fieldset > div:nth-child(8) > div.row");
    /**
     * @type {HTMLDivElement}
     */
    const landingpageHint = document.querySelector(
        "#myform > fieldset > div:nth-child(7) > div > div.col-md-8 > small");
    /**
     * @type {HTMLSelectElement}
     */
    const bannerTypeInputField = document.querySelector('#banner_type');
    /**
     * @type {HTMLDivElement}
     */
    const bannerTypeInputFieldContainer = document.querySelector(
        "#myform > fieldset > div:nth-child(8) > div:nth-child(2) > div");
    /**
     * @type {HTMLSelectElement}
     */
    const bannerSizeInputField = document.querySelector("#banner_size");
    /**
     * @type {HTMLDivElement}
     */
    const bannerSizeInputFieldContainer = document.querySelector(
        "#myform > fieldset > div:nth-child(8) > div:nth-child(3) > div");
    const bannerSizeInputFieldV_defaultValue = String(bannerSizeInputField.value);
    /**
     * @type {HTMLImageElement}
     */
    const imageBanner = document.querySelector('.image-banner');
    /**
     * @type {HTMLVideoElement}
     */
    const videoBanner = document.querySelector('.video-banner');

    const setBannerType = (value) => {

        [imageBanner, videoBanner].forEach((banner) => {
            banner.classList.contains('d-none') && banner.classList.remove('d-none');
            banner.classList.contains('d-block') && banner.classList.remove('d-block');
        });
        bannerSizeInputFieldContainer.style.display = '';

        window.bannerType = value;

        if (value == banner_types.IMG) {
            bannerSizeInputFieldContainer.style.display = '';
            imageBanner.classList.add('d-block');
            videoBanner.classList.add('d-none');
            (!imageBanner.src || imageBanner.src.includes('.mp4') || imageBanner.src.includes('.webm')) && (imageBanner.src = 'https://adbirt.com/public/assets/photos/Placeholder.jpg');

        } else if (value == banner_types.VID) {

            bannerSizeInputFieldContainer.style.display = 'none';
            bannerSizeInputField.value = '300 x 250';
            imageBanner.classList.add('d-none');
            videoBanner.classList.add('d-block');
        }
    }

    const setCampaignType = (value) => {

        successPageInputContainer.style.display = '';
        landingpageHint.style.display = '';
        bannerSizeInputFieldContainer.style.display = 'none';
        (bannerTypeInputField.getAttribute('disabled')) && bannerTypeInputField.removeAttribute(
            'disabled');

        window.campaignType = value;

        if (value == campaign_types.CPA) {

            (bannerSizeInputField.getAttribute('disabled')) && bannerSizeInputField.removeAttribute(
                'disabled');
            bannerSizeInputFieldContainer.style.display = '';

        } else if (value == campaign_types.CPC) {

            successPageinputField.value = '';
            (bannerTypeInputField.getAttribute('disabled')) && bannerTypeInputField.removeAttribute(
                'disabled');
            bannerSizeInputFieldContainer.style.display = '';
            successPageInputContainer.style.display = 'none';
            landingpageHint.style.display = 'none';

        } else if (value == campaign_types.NATIVE_CONTENT_AD) {

            successPageinputField.value = '';
            bannerSizeInputField.value = '300 x 250';
            bannerSizeInputField.setAttribute('disabled', 'disabled');
            bannerSizeInputFieldContainer.style.display = '';
            bannerTypeInputField.value = banner_types.IMG;
            bannerTypeInputField.setAttribute('disabled', 'disabled');
            successPageInputContainer.style.display = 'none';
            landingpageHint.style.display = 'none';

        }
    }

    setBannerType(window.bannerType);
    setCampaignType(window.campaignType);

    const bannerTypeChanged = (e) => {

        /**
         * @type {typeof banner_types}
         */
        const value = String(e.target.value);

        setBannerType(value);

    }

    const campaignTypeChanged = (e) => {

        /**
         * @type {typeof campaign_types}
         */
        const value = String(e.target.value);

        console.log('Event fired: ', value);

        setCampaignType(value);
    }

    campaign_type_selector.addEventListener('change', campaignTypeChanged);

    bannerTypeInputField.addEventListener('change', bannerTypeChanged);

})();