var box = document.getElementById('box');
var lis = box.getElementsByTagName('li');
var divs = box.getElementsByTagName('div');
console.log(divs)
//    console.log(lis[0]);
//    lis[索引]
//    console.log(lis.item(0));  //索引
for(var i=0;i<lis.length;i++){
//        console.log(typeof lis[i]);
    lis[i].zhufeng = i;
    lis[i].onmouseover = function(){
        for(var j=0;j<lis.length;j++){
            lis[j].className = '';//class类名设置为空
            divs[j].className = '';
        }
        this.className = 'number-left-img';
        divs[this.zhufeng].className = 'number-left-img';
    }
}
