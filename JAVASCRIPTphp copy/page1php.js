function checkButton() {
    var rad1 = document.getElementById("rad1");
    var rad2 = document.getElementById("rad2");
    var rad3 = document.getElementById("rad3");
    if (rad3.checked == true) {
        window.location.href = "page2.php";
    }
    else {
        window.location.href = "page1.php";
    }
}