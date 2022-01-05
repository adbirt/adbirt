/**
 * Adbirt publisher script
 */
(() => {
    try {
        let iter_index = 0;
        let payload = "";

        const ubm_banners = Array.from(document.querySelectorAll("a.ubm-banner"));
        console.log('ubm_banners: ', ubm_banners);

        iter_index = 0;
        for (const banner of ubm_banners) {
            let bannerCode = String(banner.dataset.id);

            let campaignType = String(banner.dataset.type) || 'CPA';
            let nativeType = String(banner.dataset.native); // 'native', 'feed'

            banner.id = `ubm_${iter_index}`;
            payload += `${JSON.stringify({
                bannerCode,
                nativeType
            })}-sep-`;
            iter_index++;
        }

        console.log('payload: ', payload);

        if (iter_index > 0) {
            fetch("https://www.adbirt.com/ubm_getbanner", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: new URLSearchParams({
                    ubm_banners: payload,
                    ubm_anticache: (Math.random()).toString(),
                    action: "ubm_getbanner"
                })
            }).then(async (res) => {
                if (res.ok) {
                    const payload = await res.json();
                    const banners = JSON.parse(payload.html);
                    iter_index = 0;
                    for (const banner of banners) {
                        // console.log(banner.trim());
                        if (banner && (typeof banner == 'string') && banner.length && (banner.match("ubm_banner") != null)) {
                            const tmpDiv = document.createElement("div");
                            Array.from(document.querySelectorAll("#ubm_" + iter_index)).forEach(item => {
                                tmpDiv.innerHTML = banner.trim();
                                item.replaceWith(tmpDiv.firstElementChild);
                            });
                            tmpDiv.remove();
                        }
                        iter_index++;
                    }
                }
            }).catch((err) => {
                console.error('Adbirt publisher script error: ', err);
            });
        }
    } catch (error) {
        console.error(error);
    }
})();