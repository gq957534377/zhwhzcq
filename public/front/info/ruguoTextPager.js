
function ruguoPager(){
    this.sig="_ueditor_page_break_tag_",
        this.objName="",
        this.pagerID="",
        this.txtID="",
        this.currPage=1,
        this.itemCount=0,
        this.showPageCount="3";
    this.toPoint="",
        this.contents="",

        this.isShowFirstPage="always",
        this.isShowPreviousPage="always",
        this.isShowNextPage="always",
        this.isShowLastPage="always",
        this.isShowPages="always",
        this.isShowAll="always",
        this.isShowGo="always"
}

function ruguoPagerLoad(myPager){
    var pageCount=0;
    var sig=myPager.sig;
    var objName=myPager.objName;
    var pagerID=myPager.pagerID;
    var txtID=myPager.txtID;
    var currPage=myPager.currPage;
    var itemCount=myPager.itemCount;
    var showPageCount=myPager.showPageCount;
    var toPoint=myPager.toPoint;
    var contents=myPager.contents;

    var isShowFirstPage=myPager.isShowFirstPage;
    var isShowPreviousPage=myPager.isShowPreviousPage;
    var isShowNextPage=myPager.isShowNextPage;
    var isShowLastPage=myPager.isShowLastPage;
    var isShowPages=myPager.isShowPages;
    var isShowAll=myPager.isShowAll;
    var isShowGo=myPager.isShowGo;

    if(arguments.length>1){
        currPage= arguments[1];
    }
    else{
        myPager.contents=$("#"+txtID).html();
        contents=myPager.contents;
    }

    var obj=new Array();
    obj = contents.split(sig);
    itemCount=parseInt(obj.length);
    $("#"+txtID).html(obj[currPage-1]);



    pageCount=parseInt(itemCount);


    if(pageCount>1){
        if(pageCount<1)pageCount=1;
        if(currPage>pageCount)currPage=pageCount;
        if(currPage<1)currPage=1;



        var PagerString="";
        PagerString+=CreateInfos(currPage,pageCount,itemCount);

        PagerString+="<ul class='btns'>";
        if(isShowFirstPage=="always") {
            PagerString+=CreatFirstPage(objName);
        }else if(isShowFirstPage=="auto"&&currPage>1){
            PagerString+=CreatFirstPage(objName);
        }

        if(isShowPreviousPage=="always") {
            PagerString+=CreatPreviousPage(currPage,objName);
        }else if(isShowPreviousPage=="auto"&&currPage>1){
            PagerString+=CreatPreviousPage(currPage,objName);
        }

        if(isShowPages=="always") {
            PagerString+=CreatePages(currPage,pageCount,showPageCount,objName);
        }else if(isShowPages=="auto_0"&&pageCount>0){
            PagerString+=CreatePages(currPage,pageCount,showPageCount,objName);
        }else if(isShowPages=="auto_1"&&pageCount>1){
            PagerString+=CreatePages(currPage,pageCount,showPageCount,objName);
        }


        if(isShowNextPage=="always") {
            PagerString+=CreatNextPage(currPage,pageCount,objName);
        }else if(isShowNextPage=="auto"&&currPage<pageCount){
            PagerString+=CreatNextPage(currPage,pageCount,objName);
        }

        if(isShowLastPage=="always") {
            PagerString+=CreatLastPage(pageCount,objName);
        }else if(isShowLastPage=="auto"&&currPage<pageCount){
            PagerString+=CreatLastPage(pageCount,objName);
        }

        if(isShowAll=="always") {
            PagerString+=CreateShowAll(objName);
        }else if(isShowAll=="auto"&&currPage<pageCount){
            PagerString+=CreateShowAll(objName);
        }

        if(isShowGo=="always") {
            PagerString+="</ul><ul class='goto'>";
            PagerString+="<input type='text' data-max='"+itemCount+"'><a>GO</a>";
            PagerString+="</ul>";
        }else if(isShowGo=="auto"&&pageCount>1){
            PagerString+="</ul><ul class='goto'>";
            PagerString+="<input type='text'><a>GO</a>";
            PagerString+="</ul>";
        }


        $("#"+pagerID).html(PagerString);

        if(toPoint!=""){
            $("#"+pagerID+">.btns>li>a").attr("href","#"+toPoint);
            $("#"+pagerID+">.goto>a").attr("href","#"+toPoint);
        }
        $("#"+pagerID+">.goto>a").click(function(){
            var topage = $(this).parent().find("input").val();
            ruguoPagerLoad(myPager, parseInt(topage));
        });


        $("#"+pagerID+">.goto>input").keyup(function(){
            var maxPage=parseInt($(this).attr("data-max"));
            var inputPage=parseInt($(this).val());
            if(!isNaN($(this).val())){
                if(inputPage>maxPage)$(this).val(maxPage);
                if(inputPage<1)$(this).val(1);
            }
            else{
                $(this).val(1);
            }

        });
    }

}

function CreateInfos(currPage,pageCount,itemCount){
    var str="";
    str+="<ul class='infos'>";
    str+="<li>第<span class='currpage'>"+currPage+"</span>/<span class='pagecount'>"+pageCount+"</span>页</li>";

    var lastItem=0;
    if(currPage==pageCount){
        lastItem=itemCount;
    }else{
        lastItem=currPage;
    }
    str+="</ul>";
    return str

}



//生成首页按钮
function CreatFirstPage(objName){
    var str="<li><a onclick='ruguoPagerLoad("+objName+",1)'>首页</a></li>"
    return str;
}


//生成上一页按钮
function CreatPreviousPage(currPage,objName){
    var fstr="onclick='javascript:void(0)'";
    if(currPage>1){
        fstr="onclick='ruguoPagerLoad("+objName+","+(currPage-1)+")'";
    }
    var str="<li><a "+fstr+">上一页</a></li>";
    return str;
}

//生成下一页按钮
function CreatNextPage(currPage,pageCount,objName){
    var fstr="onclick='javascript:void(0)'";
    if(currPage<pageCount){
        fstr="onclick='ruguoPagerLoad("+objName+","+(currPage+1)+")'";
    }
    var str="<li><a "+fstr+">下一页</a></li>";
    return str;
}

//生成尾页按钮
function CreatLastPage(pageCount,objName){
    var str="<li><a onclick='ruguoPagerLoad("+objName+","+pageCount+")'>尾页</a></li>"
    return str;
}


function CreatePages(currPage,pageCount,showPageCount,objName){
    var str="";

    //处理当前页码左边的页码
    if(currPage<=showPageCount){ //左边不够显示完 showPageCount数量的页码
        for(var i=1;i<currPage;i++){
            if(i>0){
                str+="<li><a  onclick='ruguoPagerLoad("+objName+","+i+")'>"+i+"</a></li>";
            }
        }
    }
    else{  //左边能够显示完 showPageCount数量的页码
        var lc=showPageCount-(pageCount-currPage);
        var start=currPage-showPageCount;
        if(pageCount-currPage<=showPageCount){
            start=currPage-showPageCount-lc;
        }
        for(var i=start;i<currPage;i++){
            if(i>0){
                str+="<li><a onclick='ruguoPagerLoad("+objName+","+i+")'>"+i+"</a></li>";
            }
        }


    }

    //加上当前页码
    str+="<li class='curr'><a onclick='ruguoPagerLoad("+objName+","+currPage+")'>"+currPage+"</a></li>";


    //处理当前页码右边的页码
    if(pageCount-currPage<=showPageCount){ //右边不够显示完 showPageCount数量的页码
        for(var i=currPage+1;i<=pageCount;i++){
            str+="<li><a onclick='ruguoPagerLoad("+objName+","+i+")'>"+i+"</a></li>";
        }
    }
    else{  //右边能够显示完 showPageCount数量的页码
        var rc=showPageCount-currPage+1;
        var end=currPage+showPageCount;
        if(currPage<=showPageCount){
            end=currPage+showPageCount+rc;
        }
        for(var i=currPage+1;i<=end;i++){
            str+="<li><a onclick='ruguoPagerLoad("+objName+","+i+")'>"+i+"</a></li>";
        }
    }

    return str;
}

function CreateShowAll(objName){
    return "<li><a onclick='ShowAll("+objName+")'>显示全文</a></li>";
}

//全部显示
function ShowAll(objName){
    var alltxt=objName.contents.replaceAll("_ueditor_page_break_tag_","");
    $("#"+objName.txtID).html(alltxt);
    $("#"+objName.pagerID).hide();
}

String.prototype.replaceAll = function(s1,s2) {

    return this.replace(new RegExp(s1,"gm"),s2);

}
