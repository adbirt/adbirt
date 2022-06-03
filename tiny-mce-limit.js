(async () => {

    /**
     * @type {HTMLInputElement} HTMLInputElement
     */
    let element = document.querySelector("body > div.wp-site-blocks > div > div.wp-container-18.wp-block-group.coblocks-animate.fadeIn > div > div.su-tabs-panes > div.su-tabs-pane.su-u-clearfix.su-u-trim.su-tabs-pane-open > form > div.fpsml-field-wrap.fpsml-has-submit-btn > div > input[type=submit]");

    const keepChecking = async () => {

        element = document.querySelector("body > div.wp-site-blocks > div > div.wp-container-18.wp-block-group.coblocks-animate.fadeIn > div > div.su-tabs-panes > div.su-tabs-pane.su-u-clearfix.su-u-trim.su-tabs-pane-open > form > div.fpsml-field-wrap.fpsml-has-submit-btn > div > input[type=submit]");
        if (!element) return setTimeout(() => keepChecking(), 1000);

        element.addEventListener('click', (e) => {

            e.preventDefault();

            const getTinyMCEStats = () => {
                const tinyMCEForm = window.tinymce.get('fpsml_author_post_form');
                const body = tinyMCEForm.getBody()
                const text = tinymce.trim(body.innerText || body.textContent);

                return {
                    chars: text.length,
                    words: text.split(/[\w\u2019\'-]+/).length
                };
            }

            if (getTinyMCEStats().words < 1000) {
                alert("You need to enter 1000 words or more.");
                return false;
            }

            element.form.submit();

            return true;
        });
    }

    setTimeout(() => keepChecking(), 500);

})();
