!function(e,n){"$:nomunge";function t(e){return"string"==typeof e}function r(e){var n=v.call(arguments,1);return function(){return e.apply(this,n.concat(v.call(arguments)))}}function o(e){return e.replace(/^[^#]*#?(.*)$/,"$1")}function a(e){return e.replace(/(?:^[^?#]*\?([^#]*).*$)?.*/,"$1")}function i(r,o,a,i,c){var u,f,p,h,d;return i!==s?(p=a.match(r?/^([^#]*)\#?(.*)$/:/^([^#?]*)\??([^#]*)(#?.*)/),d=p[3]||"",2===c&&t(i)?f=i.replace(r?R:E,""):(h=l(p[2]),i=t(i)?l[r?A:w](i):i,f=2===c?i:1===c?e.extend({},i,h):e.extend({},h,i),f=$(f),r&&(f=f.replace(g,y))),u=p[1]+(r?"#":f||!p[1]?"?":"")+f+d):u=o(a!==s?a:n[S][q]),u}function c(e,n,r){return n===s||"boolean"==typeof n?(r=n,n=$[e?A:w]()):n=t(n)?n.replace(e?R:E,""):n,l(n,r)}function u(n,r,o,a){return t(o)||"object"==typeof o||(a=o,o=r,r=s),this.each(function(){var t=e(this),i=r||m()[(this.nodeName||"").toLowerCase()]||"",c=i&&t.attr(i)||"";t.attr(i,$[n](c,o,a))})}var s,f,l,p,h,d,m,g,v=Array.prototype.slice,y=decodeURIComponent,$=e.param,b=e.bbq=e.bbq||{},x=e.event.special,j="hashchange",w="querystring",A="fragment",N="elemUrlAttr",S="location",q="href",C="src",E=/^.*\?|#.*$/g,R=/^.*\#/,U={};$[w]=r(i,0,a),$[A]=f=r(i,1,o),f.noEscape=function(n){n=n||"";var t=e.map(n.split(""),encodeURIComponent);g=new RegExp(t.join("|"),"g")},f.noEscape(",/"),e.deparam=l=function(n,t){var r={},o={"true":!0,"false":!1,"null":null};return e.each(n.replace(/\+/g," ").split("&"),function(n,a){var i,c=a.split("="),u=y(c[0]),f=r,l=0,p=u.split("]["),h=p.length-1;if(/\[/.test(p[0])&&/\]$/.test(p[h])?(p[h]=p[h].replace(/\]$/,""),p=p.shift().split("[").concat(p),h=p.length-1):h=0,2===c.length)if(i=y(c[1]),t&&(i=i&&!isNaN(i)?+i:"undefined"===i?s:o[i]!==s?o[i]:i),h)for(;h>=l;l++)u=""===p[l]?f.length:p[l],f=f[u]=h>l?f[u]||(p[l+1]&&isNaN(p[l+1])?{}:[]):i;else e.isArray(r[u])?r[u].push(i):r[u]!==s?r[u]=[r[u],i]:r[u]=i;else u&&(r[u]=t?s:"")}),r},l[w]=r(c,0),l[A]=p=r(c,1),e[N]||(e[N]=function(n){return e.extend(U,n)})({a:q,base:q,iframe:C,img:C,input:C,form:"action",link:q,script:C}),m=e[N],e.fn[w]=r(u,w),e.fn[A]=r(u,A),b.pushState=h=function(e,r){t(e)&&/^#/.test(e)&&r===s&&(r=2);var o=e!==s,a=f(n[S][q],o?e:{},o?r:2);n[S][q]=a+(/#/.test(a)?"":"#")},b.getState=d=function(e,n){return e===s||"boolean"==typeof e?p(e):p(n)[e]},b.removeState=function(n){var t={};n!==s&&(t=d(),e.each(e.isArray(n)?n:arguments,function(e,n){delete t[n]})),h(t,2)},x[j]=e.extend(x[j],{add:function(n){function t(e){var n=e[A]=f();e.getState=function(e,t){return e===s||"boolean"==typeof e?l(n,e):l(n,t)[e]},r.apply(this,arguments)}var r;return e.isFunction(n)?(r=n,t):(r=n.handler,void(n.handler=t))}})}(jQuery,this),function(e,n,t){"$:nomunge";function r(e){return e=e||n[i][u],e.replace(/^[^#]*#?(.*)$/,"$1")}var o,a=e.event.special,i="location",c="hashchange",u="href",s=e.browser,f=document.documentMode,l=s.msie&&(f===t||8>f),p="on"+c in n&&!l;e[c+"Delay"]=100,a[c]=e.extend(a[c],{setup:function(){return p?!1:void e(o.start)},teardown:function(){return p?!1:void e(o.stop)}}),o=function(){function t(){s=f=function(e){return e},l&&(a=e('<iframe src="javascript:0"/>').hide().insertAfter("body")[0].contentWindow,f=function(){return r(a.document[i][u])},(s=function(e,n){if(e!==n){var t=a.document;t.open().close(),t[i].hash="#"+e}})(r()))}var o,a,s,f,p={};return p.start=function(){if(!o){var a=r();s||t(),function l(){var t=r(),p=f(a);t!==a?(s(a=t,p),e(n).trigger(c)):p!==a&&(n[i][u]=n[i][u].replace(/#.*/,"")+"#"+p),o=setTimeout(l,e[c+"Delay"])}()}},p.stop=function(){a||(o&&clearTimeout(o),o=0)},p}()}(jQuery,this);