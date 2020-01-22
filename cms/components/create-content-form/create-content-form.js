function validateContentTypeSelection(event) {
    event.preventDefault();
    if (!this.select.value) {

        this.select.classList.add('required-field');
    }
};

var createContentForm = document.querySelector('.create-content-form');

if (createContentForm) {
    (function() {
        var sendBtn = createContentForm.querySelector('#crateContent');
        var obj = {
            'sendBtn': sendBtn,
            'form': createContentForm,
            'select': createContentForm.querySelector('select')
        }

        sendBtn.addEventListener('click', validateContentTypeSelection.bind(obj));
    })();
}