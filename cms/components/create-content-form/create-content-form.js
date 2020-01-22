function validateContentTypeSelection(event) {
    if (!this.select.value) {
        event.preventDefault();
        this.select.classList.add('required-field');
    }

    if (!this.title.value) {
        event.preventDefault();
        this.title.classList.add('required-field');
    }
};

var createContentForm = document.querySelector('.create-content-form');

if (createContentForm) {
    (function() {
        var sendBtn = createContentForm.querySelector('#crateContent');
        var obj = {
            'sendBtn': sendBtn,
            'form': createContentForm,
            'select': createContentForm.querySelector('select'),
            'title': createContentForm.querySelector('input[type=text]')
        }

        sendBtn.addEventListener('click', validateContentTypeSelection.bind(obj));
    })();
}