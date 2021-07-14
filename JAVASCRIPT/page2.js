function checkButton() {
    var ch1 = document.querySelector('input[name="first-choice"]:checked');
    var ch2 = document.querySelector('input[name="second-choice"]:checked');
    if(ch1.value == 'yes' && ch2.value == 'yes') {
        window.location.href = "page3.php";
    }
    else {
        window.location.href = "page1.php";
    }
    
}
