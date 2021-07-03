function checkButton() {
    var ch1 = document.querySelector('input[name="ch1"]:checked');
    var ch2 = document.querySelector('input[name="ch2"]:checked');
    var ch3 = document.querySelector('input[name="ch3"]:checked');
    if(ch1.value == 'yes' && ch2.value == 'yes' && ch3.value == 'yes') {
        window.location.href = "page3.html";
    }
    else {
        window.location.href = "page1.html";
    }
    
}