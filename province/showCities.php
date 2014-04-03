<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>省市联动</title>

<script>
var XHR = function(){
    if (typeof XMLHttpRequest == "undefined") {
        var xhrNames = ["MSXML2.XMLHTTP.6.0","MSXML2.XMLHTTP.3.0",
            "MSXML2.XMLHTTP","Microsoft.XMLHTTP"];
        for (var i = 0; i<xhrNames.length; i++){
            try{
                var XHR = new ActiveXObject(xhrNames[i]);
                break;
            } catch(e){}
        }
        if (typeof XHR != "undefined")
            return XHR;
        else
            new Error("Ajax not suppouted");
    } else{
        return new XMLHttpRequest();
    }  
}
var myXHR = new XHR();

function changeCities(){
    var url = "showCitiesPro.php";
    var data = "province="+$('province').value;

    myXHR.onreadystatechange = process;
    
    myXHR.open("POST",url,true);
    myXHR.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    myXHR.send(data); 
    
}

function process(){
    if(myXHR.readyState == 4){
        if(myXHR.status == 200){
            var cities = myXHR.responseXML.getElementsByTagName('city');
            $('city').length = 0;
            var myOption = document.createElement('option');
            myOption.innerHTML = "--市--";
            $('city').appendChild(myOption);
            for(var i=0; i<cities.length; i++){
                var city_name = cities[i].childNodes[0].nodeValue;
                //创建option节点并添加
                var myOption = document.createElement('option');
                myOption.value = city_name;
                myOption.innerHTML = city_name;
                $('city').appendChild(myOption);
            }
        }
    }
}

function $(id){
    return document.getElementById(id);
}
</script>
</head>
<body>
    <select id="province" onchange="changeCities()">
      <option value="">--省--</option>
      <option value="zhejiang">浙江</option>
      <option value="jiangsu">江苏</option>
    </select>
    <select id="city">
      <option value="">--市--</option>
    </select>
    <select id="country">
      <option value="">--县--</option>
    </select>
</body>
</html>
