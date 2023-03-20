// Thêm request vào GET hiện tại
function addGetRequest($name, $value) {
    var url = new URL(window.location.href);
    if (url.searchParams.has($name)) {
        url.searchParams.delete($name);
    }
    url.searchParams.append($name, $value);
    window.location.href = url.href;
}
function getPageRequest($value) {
    var url = new URL(window.location.href);
    if (url.searchParams.has('page')) {
        url.searchParams.delete('page');
    }
    url.searchParams.append('page', $value);
    window.location.href = url.href;
}
$('#dropdown-branch').click(function() {
    document.getElementById('foot-body-1').style.display = "block";
    document.getElementById('dropdown-branch').style.display = "none";
    document.getElementById('pull-up-branch').style.display = "block";
  });
  $('#dropdown-faq').click(function() {
    document.getElementById('foot-body-2').style.display = "block";
    document.getElementById('dropdown-faq').style.display = "none";
    document.getElementById('pull-up-faq').style.display = "block";
  });
  $('#dropdown-support').click(function() {
    document.getElementById('foot-body-3').style.display = "block";
    document.getElementById('dropdown-support').style.display = "none";
    document.getElementById('pull-up-support').style.display = "block";
  });
  $('#pull-up-branch').click(function() {
    document.getElementById('foot-body-1').style.display = "none";
    document.getElementById('dropdown-branch').style.display = "block";
    document.getElementById('pull-up-branch').style.display = "none";
  });
  $('#pull-up-faq').click(function() {
    document.getElementById('foot-body-2').style.display = "none";
    document.getElementById('dropdown-faq').style.display = "block";
    document.getElementById('pull-up-faq').style.display = "none";
  });
  $('#pull-up-support').click(function() {
    document.getElementById('foot-body-3').style.display = "none";
    document.getElementById('dropdown-support').style.display = "block";
    document.getElementById('pull-up-support').style.display = "none";
  });