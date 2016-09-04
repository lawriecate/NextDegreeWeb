//var ROOT_URL = "http://localhost:8888/nd/NextDegreeWeb/public/";
var ROOT_URL = "https://nextdegree.co.uk/"
$(function() {
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
    }
});
});