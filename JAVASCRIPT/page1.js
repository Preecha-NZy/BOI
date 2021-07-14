function checkButton() {
    var rad1 = document.getElementById("first-choice");
    var rad2 = document.getElementById("second-choice");
    var rad3 = document.getElementById("third-choice");
    if (rad3.checked == true) {
        window.location.href = "page2.php";
    }
    else {
        window.location.href = "page1.php";
    }
}

function test(input) {
    console.log(input)
}