var ROOT_URL = "https://nextdegree.co.uk/";
//var ROOT_URL = "https://nextdegree.co.uk/"
$(function() {
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
    }
});
});