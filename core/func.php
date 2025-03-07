<?

function get_admin()
{
    return isset($_SESSION['admin']);
}

function h(string $str){
    return htmlspecialchars($str);
}