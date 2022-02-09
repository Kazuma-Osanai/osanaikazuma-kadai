//js2_2課題
function hover_over() {
    document.getElementById("mous").addEventListener (
        "mouseover", 
        function() {
            document.getElementById("syousai").style.display = 'block';
        }, 
        false
    );
}

function hover_out() {
    document.getElementById("mous").addEventListener (
        "mouseout", 
        function() {
            document.getElementById("syousai").style.display = 'none';
        }, 
        false
    );
}

//js2_3課題
function ageCheck(){
    var age = document.getElementById('age');
    var check = /^([1-9]\d*|0)$/;

    if(check.test(age.value)) {

        if(age.value >= 20) {
            var result = "成人です"
        } else {
            var result = "未成年です"
        }

        alert(
            "年齢:" + age.value + "歳" + "\n" +
            result
        );

    } else {
        alert("正しく入力してください");
    }
}

