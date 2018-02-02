$(() => {
    $(document).on('keypress', e => {
        const evt = e || window.event;
        const keyCode = evt.which || evt.keyCode;
        const ref = evt.target || evt.srcElement;
        const isEnterKey = keyCode == 13 &&
            (ref.type == 'text' ||
                ref.type == 'number' ||
                ref.type == 'radio' ||
                ref.type == 'checkbox')

        if (isEnterKey) {
            return false;
        }
    });
});