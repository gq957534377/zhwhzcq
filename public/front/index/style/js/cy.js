(function(){
    var appid = 'cyrIiB2Xt',
    conf = 'prod_89d2e1e34e8a801f5cc5478bfccd44c4';
    var doc = document,
    s = doc.createElement('script'),
    h = doc.getElementsByTagName('head')[0] || doc.head || doc.documentElement;
    s.type = 'text/javascript';
    s.charset = 'utf-8';
    s.src =  'http://assets.changyan.sohu.com/upload/changyan.js?conf='+ conf +'&appid=' + appid;
    h.insertBefore(s,h.firstChild);
    window.SCS_NO_IFRAME = true;
  })()
document.writeln("<script type='text/javascript' charset='utf-8' src='http://assets.changyan.sohu.com/upload/plugins/plugins.count.js'></script>");