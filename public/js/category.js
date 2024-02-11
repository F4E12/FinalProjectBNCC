document.querySelector('select[name="dropdown"]').addEventListener('change', function() {
    var category = this.value;

    var url = '/catalogPage?category=' + category;
    window.location.href = url;
});
