//var ROOT_URL = "https://nextdegree.co.uk/";
var ROOT_URL = "http://localhost:8888/nd/NextDegreeWeb/public/"
$(function() {
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
    }
});
});
/*! UIkit 2.26.4 | http://www.getuikit.com | (c) 2014 YOOtheme | MIT License */
!function(e){var t;window.UIkit&&(t=e(UIkit)),"function"==typeof define&&define.amd&&define("uikit-upload",["uikit"],function(){return t||e(UIkit)})}(function(e){"use strict";function t(o,a){function r(t,n){var o=new FormData,a=new XMLHttpRequest;if(n.before(n,t)!==!1){for(var r,i=0;r=t[i];i++)o.append(n.param,r);for(var l in n.params)o.append(l,n.params[l]);a.upload.addEventListener("progress",function(e){var t=e.loaded/e.total*100;n.progress(t,e)},!1),a.addEventListener("loadstart",function(e){n.loadstart(e)},!1),a.addEventListener("load",function(e){n.load(e)},!1),a.addEventListener("loadend",function(e){n.loadend(e)},!1),a.addEventListener("error",function(e){n.error(e)},!1),a.addEventListener("abort",function(e){n.abort(e)},!1),a.open(n.method,n.action,!0),"json"==n.type&&a.setRequestHeader("Accept","application/json"),a.onreadystatechange=function(){if(n.readystatechange(a),4==a.readyState){var t=a.responseText;if("json"==n.type)try{t=e.$.parseJSON(t)}catch(o){t=!1}n.complete(t,a)}},n.beforeSend(a),a.send(o)}}if(!e.support.ajaxupload)return this;if(a=e.$.extend({},t.defaults,a),o.length){if("*.*"!==a.allow)for(var i,l=0;i=o[l];l++)if(!n(a.allow,i.name))return"string"==typeof a.notallowed?alert(a.notallowed):a.notallowed(i,a),void 0;var f=a.complete;if(a.single){var s=o.length,d=0,p=!0;a.beforeAll(o),a.complete=function(e,t){d+=1,f(e,t),a.filelimit&&d>=a.filelimit&&(p=!1),p&&s>d?r([o[d]],a):a.allcomplete(e,t)},r([o[0]],a)}else a.complete=function(e,t){f(e,t),a.allcomplete(e,t)},r(o,a)}}function n(e,t){var n="^"+e.replace(/\//g,"\\/").replace(/\*\*/g,"(\\/[^\\/]+)*").replace(/\*/g,"[^\\/]+").replace(/((?!\\))\?/g,"$1.")+"$";return n="^"+n+"$",null!==t.match(new RegExp(n,"i"))}return e.component("uploadSelect",{init:function(){var e=this;this.on("change",function(){t(e.element[0].files,e.options);var n=e.element.clone(!0).data("uploadSelect",e);e.element.replaceWith(n),e.element=n})}}),e.component("uploadDrop",{defaults:{dragoverClass:"uk-dragover"},init:function(){var e=this,n=!1;this.on("drop",function(n){n.originalEvent.dataTransfer&&n.originalEvent.dataTransfer.files&&(n.stopPropagation(),n.preventDefault(),e.element.removeClass(e.options.dragoverClass),e.element.trigger("dropped.uk.upload",[n.originalEvent.dataTransfer.files]),t(n.originalEvent.dataTransfer.files,e.options))}).on("dragenter",function(e){e.stopPropagation(),e.preventDefault()}).on("dragover",function(t){t.stopPropagation(),t.preventDefault(),n||(e.element.addClass(e.options.dragoverClass),n=!0)}).on("dragleave",function(t){t.stopPropagation(),t.preventDefault(),e.element.removeClass(e.options.dragoverClass),n=!1})}}),e.support.ajaxupload=function(){function e(){var e=document.createElement("INPUT");return e.type="file","files"in e}function t(){var e=new XMLHttpRequest;return!!(e&&"upload"in e&&"onprogress"in e.upload)}function n(){return!!window.FormData}return e()&&t()&&n()}(),t.defaults={action:"",single:!0,method:"POST",param:"files[]",params:{},allow:"*.*",type:"text",filelimit:!1,before:function(){},beforeSend:function(){},beforeAll:function(){},loadstart:function(){},load:function(){},loadend:function(){},error:function(){},abort:function(){},progress:function(){},complete:function(){},allcomplete:function(){},readystatechange:function(){},notallowed:function(e,t){alert("Only the following file types are allowed: "+t.allow)}},e.Utils.xhrupload=t,t});
/*! UIkit 2.26.4 | http://www.getuikit.com | (c) 2014 YOOtheme | MIT License */
!function(t){var e;window.UIkit&&(e=t(UIkit)),"function"==typeof define&&define.amd&&define("uikit-datepicker",["uikit"],function(){return e||t(UIkit)})}(function(t){"use strict";var e,n,a=!1;return t.component("datepicker",{defaults:{mobile:!1,weekstart:1,i18n:{months:["January","February","March","April","May","June","July","August","September","October","November","December"],weekdays:["Sun","Mon","Tue","Wed","Thu","Fri","Sat"]},format:"YYYY-MM-DD",offsettop:5,maxDate:!1,minDate:!1,pos:"auto",template:function(e,n){var a,s="";if(s+='<div class="uk-datepicker-nav">',s+='<a href="" class="uk-datepicker-previous"></a>',s+='<a href="" class="uk-datepicker-next"></a>',t.formSelect){var i,r,o,u,c=(new Date).getFullYear(),d=[];for(a=0;a<n.i18n.months.length;a++)a==e.month?d.push('<option value="'+a+'" selected>'+n.i18n.months[a]+"</option>"):d.push('<option value="'+a+'">'+n.i18n.months[a]+"</option>");for(i='<span class="uk-form-select">'+n.i18n.months[e.month]+'<select class="update-picker-month">'+d.join("")+"</select></span>",d=[],o=e.minDate?e.minDate.year():c-50,u=e.maxDate?e.maxDate.year():c+20,a=o;u>=a;a++)a==e.year?d.push('<option value="'+a+'" selected>'+a+"</option>"):d.push('<option value="'+a+'">'+a+"</option>");r='<span class="uk-form-select">'+e.year+'<select class="update-picker-year">'+d.join("")+"</select></span>",s+='<div class="uk-datepicker-heading">'+i+" "+r+"</div>"}else s+='<div class="uk-datepicker-heading">'+n.i18n.months[e.month]+" "+e.year+"</div>";for(s+="</div>",s+='<table class="uk-datepicker-table">',s+="<thead>",a=0;a<e.weekdays.length;a++)e.weekdays[a]&&(s+="<th>"+e.weekdays[a]+"</th>");for(s+="</thead>",s+="<tbody>",a=0;a<e.days.length;a++)if(e.days[a]&&e.days[a].length){s+="<tr>";for(var l=0;l<e.days[a].length;l++)if(e.days[a][l]){var h=e.days[a][l],f=[];h.inmonth||f.push("uk-datepicker-table-muted"),h.selected&&f.push("uk-active"),h.disabled&&f.push("uk-datepicker-date-disabled uk-datepicker-table-muted"),s+='<td><a href="" class="'+f.join(" ")+'" data-date="'+h.day.format()+'">'+h.day.format("D")+"</a></td>"}s+="</tr>"}return s+="</tbody>",s+="</table>"}},boot:function(){t.$win.on("resize orientationchange",function(){a&&a.hide()}),t.$html.on("focus.datepicker.uikit","[data-uk-datepicker]",function(e){var n=t.$(this);n.data("datepicker")||(e.preventDefault(),t.datepicker(n,t.Utils.options(n.attr("data-uk-datepicker"))),n.trigger("focus"))}),t.$html.on("click focus","*",function(n){var s=t.$(n.target);!a||s[0]==e[0]||s.data("datepicker")||s.parents(".uk-datepicker:first").length||a.hide()})},init:function(){if(!t.support.touch||"date"!=this.element.attr("type")||this.options.mobile){var s=this;this.current=this.element.val()?n(this.element.val(),this.options.format):n(),this.on("click focus",function(){a!==s&&s.pick(this.value?this.value:s.options.minDate?s.options.minDate:"")}).on("change",function(){s.element.val()&&!n(s.element.val(),s.options.format).isValid()&&s.element.val(n().format(s.options.format))}),e||(e=t.$('<div class="uk-dropdown uk-datepicker"></div>'),e.on("click",".uk-datepicker-next, .uk-datepicker-previous, [data-date]",function(e){e.stopPropagation(),e.preventDefault();var s=t.$(this);return s.hasClass("uk-datepicker-date-disabled")?!1:(s.is("[data-date]")?(a.current=n(s.data("date")),a.element.val(a.current.isValid()?a.current.format(a.options.format):null).trigger("change"),a.hide()):a.add(s.hasClass("uk-datepicker-next")?1:-1,"months"),void 0)}),e.on("change",".update-picker-month, .update-picker-year",function(){var e=t.$(this);a[e.is(".update-picker-year")?"setYear":"setMonth"](Number(e.val()))}),e.appendTo("body"))}},pick:function(s){var i=this.element.offset(),r={left:i.left,right:""};this.current=isNaN(s)?n(s,this.options.format):n(),this.initdate=this.current.format("YYYY-MM-DD"),this.update(),"right"==t.langdirection&&(r.right=window.innerWidth-(r.left+this.element.outerWidth()),r.left="");var o=i.top-this.element.outerHeight()+this.element.height()-this.options.offsettop-e.outerHeight(),u=i.top+this.element.outerHeight()+this.options.offsettop;r.top=u,"top"==this.options.pos?r.top=o:"auto"==this.options.pos&&window.innerHeight-u-e.outerHeight()<0&&o>=0&&(r.top=o),e.css(r).show(),this.trigger("show.uk.datepicker"),a=this},add:function(t,e){this.current.add(t,e),this.update()},setMonth:function(t){this.current.month(t),this.update()},setYear:function(t){this.current.year(t),this.update()},update:function(){var t=this.getRows(this.current.year(),this.current.month()),n=this.options.template(t,this.options);e.html(n),this.trigger("update.uk.datepicker")},getRows:function(t,e){var a=this.options,s=n().format("YYYY-MM-DD"),i=[31,t%4===0&&t%100!==0||t%400===0?29:28,31,30,31,30,31,31,30,31,30,31][e],r=new Date(t,e,1,12).getDay(),o={month:e,year:t,weekdays:[],days:[],maxDate:!1,minDate:!1},u=[];a.maxDate!==!1&&(o.maxDate=isNaN(a.maxDate)?n(a.maxDate,a.format):n().add(a.maxDate,"days")),a.minDate!==!1&&(o.minDate=isNaN(a.minDate)?n(a.minDate,a.format):n().add(a.minDate-1,"days")),o.weekdays=function(){for(var t=0,e=[];7>t;t++){for(var n=t+(a.weekstart||0);n>=7;)n-=7;e.push(a.i18n.weekdays[n])}return e}(),a.weekstart&&a.weekstart>0&&(r-=a.weekstart,0>r&&(r+=7));for(var c=i+r,d=c;d>7;)d-=7;c+=7-d;for(var l,h,f,m,_,p=0,y=0;c>p;p++)l=new Date(t,e,1+(p-r),12),h=o.minDate&&o.minDate>l||o.maxDate&&l>o.maxDate,_=!(r>p||p>=i+r),l=n(l),f=this.initdate==l.format("YYYY-MM-DD"),m=s==l.format("YYYY-MM-DD"),u.push({selected:f,today:m,disabled:h,day:l,inmonth:_}),7===++y&&(o.days.push(u),u=[],y=0);return o},hide:function(){a&&a===this&&(e.hide(),a=!1,this.trigger("hide.uk.datepicker"))}}),n=function(t){function e(t,e,n){switch(arguments.length){case 2:return null!=t?t:e;case 3:return null!=t?t:null!=e?e:n;default:throw new Error("Implement me")}}function n(t,e){return Ye.call(t,e)}function a(){return{empty:!1,unusedTokens:[],unusedInput:[],overflow:-2,charsLeftOver:0,nullInput:!1,invalidMonth:null,invalidFormat:!1,userInvalidated:!1,iso:!1}}function s(t){De.suppressDeprecationWarnings===!1&&"undefined"!=typeof console&&console.warn&&console.warn("Deprecation warning: "+t)}function i(t,e){var n=!0;return h(function(){return n&&(s(t),n=!1),e.apply(this,arguments)},e)}function r(t,e){mn[t]||(s(e),mn[t]=!0)}function o(t,e){return function(n){return _(t.call(this,n),e)}}function u(t,e){return function(n){return this.localeData().ordinal(t.call(this,n),e)}}function c(){}function d(t,e){e!==!1&&F(t),f(this,t),this._d=new Date(+t._d)}function l(t){var e=v(t),n=e.year||0,a=e.quarter||0,s=e.month||0,i=e.week||0,r=e.day||0,o=e.hour||0,u=e.minute||0,c=e.second||0,d=e.millisecond||0;this._milliseconds=+d+1e3*c+6e4*u+36e5*o,this._days=+r+7*i,this._months=+s+3*a+12*n,this._data={},this._locale=De.localeData(),this._bubble()}function h(t,e){for(var a in e)n(e,a)&&(t[a]=e[a]);return n(e,"toString")&&(t.toString=e.toString),n(e,"valueOf")&&(t.valueOf=e.valueOf),t}function f(t,e){var n,a,s;if("undefined"!=typeof e._isAMomentObject&&(t._isAMomentObject=e._isAMomentObject),"undefined"!=typeof e._i&&(t._i=e._i),"undefined"!=typeof e._f&&(t._f=e._f),"undefined"!=typeof e._l&&(t._l=e._l),"undefined"!=typeof e._strict&&(t._strict=e._strict),"undefined"!=typeof e._tzm&&(t._tzm=e._tzm),"undefined"!=typeof e._isUTC&&(t._isUTC=e._isUTC),"undefined"!=typeof e._offset&&(t._offset=e._offset),"undefined"!=typeof e._pf&&(t._pf=e._pf),"undefined"!=typeof e._locale&&(t._locale=e._locale),Fe.length>0)for(n in Fe)a=Fe[n],s=e[a],"undefined"!=typeof s&&(t[a]=s);return t}function m(t){return 0>t?Math.ceil(t):Math.floor(t)}function _(t,e,n){for(var a=""+Math.abs(t),s=t>=0;a.length<e;)a="0"+a;return(s?n?"+":"":"-")+a}function p(t,e){var n={milliseconds:0,months:0};return n.months=e.month()-t.month()+12*(e.year()-t.year()),t.clone().add(n.months,"M").isAfter(e)&&--n.months,n.milliseconds=+e-+t.clone().add(n.months,"M"),n}function y(t,e){var n;return e=I(e,t),t.isBefore(e)?n=p(t,e):(n=p(e,t),n.milliseconds=-n.milliseconds,n.months=-n.months),n}function D(t,e){return function(n,a){var s,i;return null===a||isNaN(+a)||(r(e,"moment()."+e+"(period, number) is deprecated. Please use moment()."+e+"(number, period)."),i=n,n=a,a=i),n="string"==typeof n?+n:n,s=De.duration(n,a),g(this,s,t),this}}function g(t,e,n,a){var s=e._milliseconds,i=e._days,r=e._months;a=null==a?!0:a,s&&t._d.setTime(+t._d+s*n),i&&fe(t,"Date",he(t,"Date")+i*n),r&&le(t,he(t,"Month")+r*n),a&&De.updateOffset(t,i||r)}function k(t){return"[object Array]"===Object.prototype.toString.call(t)}function M(t){return"[object Date]"===Object.prototype.toString.call(t)||t instanceof Date}function Y(t,e,n){var a,s=Math.min(t.length,e.length),i=Math.abs(t.length-e.length),r=0;for(a=0;s>a;a++)(n&&t[a]!==e[a]||!n&&S(t[a])!==S(e[a]))&&r++;return r+i}function w(t){if(t){var e=t.toLowerCase().replace(/(.)s$/,"$1");t=on[t]||un[e]||e}return t}function v(t){var e,a,s={};for(a in t)n(t,a)&&(e=w(a),e&&(s[e]=t[a]));return s}function b(e){var n,a;if(0===e.indexOf("week"))n=7,a="day";else{if(0!==e.indexOf("month"))return;n=12,a="month"}De[e]=function(s,i){var r,o,u=De._locale[e],c=[];if("number"==typeof s&&(i=s,s=t),o=function(t){var e=De().utc().set(a,t);return u.call(De._locale,e,s||"")},null!=i)return o(i);for(r=0;n>r;r++)c.push(o(r));return c}}function S(t){var e=+t,n=0;return 0!==e&&isFinite(e)&&(n=e>=0?Math.floor(e):Math.ceil(e)),n}function T(t,e){return new Date(Date.UTC(t,e+1,0)).getUTCDate()}function O(t,e,n){return oe(De([t,11,31+e-n]),e,n).week}function W(t){return U(t)?366:365}function U(t){return t%4===0&&t%100!==0||t%400===0}function F(t){var e;t._a&&-2===t._pf.overflow&&(e=t._a[ve]<0||t._a[ve]>11?ve:t._a[be]<1||t._a[be]>T(t._a[we],t._a[ve])?be:t._a[Se]<0||t._a[Se]>23?Se:t._a[Te]<0||t._a[Te]>59?Te:t._a[Oe]<0||t._a[Oe]>59?Oe:t._a[We]<0||t._a[We]>999?We:-1,t._pf._overflowDayOfYear&&(we>e||e>be)&&(e=be),t._pf.overflow=e)}function G(t){return null==t._isValid&&(t._isValid=!isNaN(t._d.getTime())&&t._pf.overflow<0&&!t._pf.empty&&!t._pf.invalidMonth&&!t._pf.nullInput&&!t._pf.invalidFormat&&!t._pf.userInvalidated,t._strict&&(t._isValid=t._isValid&&0===t._pf.charsLeftOver&&0===t._pf.unusedTokens.length)),t._isValid}function C(t){return t?t.toLowerCase().replace("_","-"):t}function z(t){for(var e,n,a,s,i=0;i<t.length;){for(s=C(t[i]).split("-"),e=s.length,n=C(t[i+1]),n=n?n.split("-"):null;e>0;){if(a=x(s.slice(0,e).join("-")))return a;if(n&&n.length>=e&&Y(s,n,!0)>=e-1)break;e--}i++}return null}function x(t){var e=null;if(!Ue[t]&&Ge)try{e=De.locale(),require("./locale/"+t),De.locale(e)}catch(n){}return Ue[t]}function I(t,e){return e._isUTC?De(t).zone(e._offset||0):De(t).local()}function H(t){return t.match(/\[[\s\S]/)?t.replace(/^\[|\]$/g,""):t.replace(/\\/g,"")}function L(t){var e,n,a=t.match(Ie);for(e=0,n=a.length;n>e;e++)a[e]=fn[a[e]]?fn[a[e]]:H(a[e]);return function(s){var i="";for(e=0;n>e;e++)i+=a[e]instanceof Function?a[e].call(s,t):a[e];return i}}function P(t,e){return t.isValid()?(e=A(e,t.localeData()),cn[e]||(cn[e]=L(e)),cn[e](t)):t.localeData().invalidDate()}function A(t,e){function n(t){return e.longDateFormat(t)||t}var a=5;for(He.lastIndex=0;a>=0&&He.test(t);)t=t.replace(He,n),He.lastIndex=0,a-=1;return t}function N(t,e){var n,a=e._strict;switch(t){case"Q":return qe;case"DDDD":return Re;case"YYYY":case"GGGG":case"gggg":return a?Xe:Ae;case"Y":case"G":case"g":return Ke;case"YYYYYY":case"YYYYY":case"GGGGG":case"ggggg":return a?Be:Ne;case"S":if(a)return qe;case"SS":if(a)return Qe;case"SSS":if(a)return Re;case"DDD":return Pe;case"MMM":case"MMMM":case"dd":case"ddd":case"dddd":return je;case"a":case"A":return e._locale._meridiemParse;case"X":return Ve;case"Z":case"ZZ":return Ee;case"T":return $e;case"SSSS":return Ze;case"MM":case"DD":case"YY":case"GG":case"gg":case"HH":case"hh":case"mm":case"ss":case"ww":case"WW":return a?Qe:Le;case"M":case"D":case"d":case"H":case"h":case"m":case"s":case"w":case"W":case"e":case"E":return Le;case"Do":return Je;default:return n=new RegExp(R(Q(t.replace("\\","")),"i"))}}function Z(t){t=t||"";var e=t.match(Ee)||[],n=e[e.length-1]||[],a=(n+"").match(sn)||["-",0,0],s=+(60*a[1])+S(a[2]);return"+"===a[0]?-s:s}function j(t,e,n){var a,s=n._a;switch(t){case"Q":null!=e&&(s[ve]=3*(S(e)-1));break;case"M":case"MM":null!=e&&(s[ve]=S(e)-1);break;case"MMM":case"MMMM":a=n._locale.monthsParse(e),null!=a?s[ve]=a:n._pf.invalidMonth=e;break;case"D":case"DD":null!=e&&(s[be]=S(e));break;case"Do":null!=e&&(s[be]=S(parseInt(e,10)));break;case"DDD":case"DDDD":null!=e&&(n._dayOfYear=S(e));break;case"YY":s[we]=De.parseTwoDigitYear(e);break;case"YYYY":case"YYYYY":case"YYYYYY":s[we]=S(e);break;case"a":case"A":n._isPm=n._locale.isPM(e);break;case"H":case"HH":case"h":case"hh":s[Se]=S(e);break;case"m":case"mm":s[Te]=S(e);break;case"s":case"ss":s[Oe]=S(e);break;case"S":case"SS":case"SSS":case"SSSS":s[We]=S(1e3*("0."+e));break;case"X":n._d=new Date(1e3*parseFloat(e));break;case"Z":case"ZZ":n._useUTC=!0,n._tzm=Z(e);break;case"dd":case"ddd":case"dddd":a=n._locale.weekdaysParse(e),null!=a?(n._w=n._w||{},n._w.d=a):n._pf.invalidWeekday=e;break;case"w":case"ww":case"W":case"WW":case"d":case"e":case"E":t=t.substr(0,1);case"gggg":case"GGGG":case"GGGGG":t=t.substr(0,2),e&&(n._w=n._w||{},n._w[t]=S(e));break;case"gg":case"GG":n._w=n._w||{},n._w[t]=De.parseTwoDigitYear(e)}}function E(t){var n,a,s,i,r,o,u;n=t._w,null!=n.GG||null!=n.W||null!=n.E?(r=1,o=4,a=e(n.GG,t._a[we],oe(De(),1,4).year),s=e(n.W,1),i=e(n.E,1)):(r=t._locale._week.dow,o=t._locale._week.doy,a=e(n.gg,t._a[we],oe(De(),r,o).year),s=e(n.w,1),null!=n.d?(i=n.d,r>i&&++s):i=null!=n.e?n.e+r:r),u=ue(a,s,i,o,r),t._a[we]=u.year,t._dayOfYear=u.dayOfYear}function $(t){var n,a,s,i,r=[];if(!t._d){for(s=J(t),t._w&&null==t._a[be]&&null==t._a[ve]&&E(t),t._dayOfYear&&(i=e(t._a[we],s[we]),t._dayOfYear>W(i)&&(t._pf._overflowDayOfYear=!0),a=ae(i,0,t._dayOfYear),t._a[ve]=a.getUTCMonth(),t._a[be]=a.getUTCDate()),n=0;3>n&&null==t._a[n];++n)t._a[n]=r[n]=s[n];for(;7>n;n++)t._a[n]=r[n]=null==t._a[n]?2===n?1:0:t._a[n];t._d=(t._useUTC?ae:ne).apply(null,r),null!=t._tzm&&t._d.setUTCMinutes(t._d.getUTCMinutes()+t._tzm)}}function V(t){var e;t._d||(e=v(t._i),t._a=[e.year,e.month,e.day,e.hour,e.minute,e.second,e.millisecond],$(t))}function J(t){var e=new Date;return t._useUTC?[e.getUTCFullYear(),e.getUTCMonth(),e.getUTCDate()]:[e.getFullYear(),e.getMonth(),e.getDate()]}function q(t){if(t._f===De.ISO_8601)return B(t),void 0;t._a=[],t._pf.empty=!0;var e,n,a,s,i,r=""+t._i,o=r.length,u=0;for(a=A(t._f,t._locale).match(Ie)||[],e=0;e<a.length;e++)s=a[e],n=(r.match(N(s,t))||[])[0],n&&(i=r.substr(0,r.indexOf(n)),i.length>0&&t._pf.unusedInput.push(i),r=r.slice(r.indexOf(n)+n.length),u+=n.length),fn[s]?(n?t._pf.empty=!1:t._pf.unusedTokens.push(s),j(s,n,t)):t._strict&&!n&&t._pf.unusedTokens.push(s);t._pf.charsLeftOver=o-u,r.length>0&&t._pf.unusedInput.push(r),t._isPm&&t._a[Se]<12&&(t._a[Se]+=12),t._isPm===!1&&12===t._a[Se]&&(t._a[Se]=0),$(t),F(t)}function Q(t){return t.replace(/\\(\[)|\\(\])|\[([^\]\[]*)\]|\\(.)/g,function(t,e,n,a,s){return e||n||a||s})}function R(t){return t.replace(/[-\/\\^$*+?.()|[\]{}]/g,"\\$&")}function X(t){var e,n,s,i,r;if(0===t._f.length)return t._pf.invalidFormat=!0,t._d=new Date(0/0),void 0;for(i=0;i<t._f.length;i++)r=0,e=f({},t),null!=t._useUTC&&(e._useUTC=t._useUTC),e._pf=a(),e._f=t._f[i],q(e),G(e)&&(r+=e._pf.charsLeftOver,r+=10*e._pf.unusedTokens.length,e._pf.score=r,(null==s||s>r)&&(s=r,n=e));h(t,n||e)}function B(t){var e,n,a=t._i,s=tn.exec(a);if(s){for(t._pf.iso=!0,e=0,n=nn.length;n>e;e++)if(nn[e][1].exec(a)){t._f=nn[e][0]+(s[6]||" ");break}for(e=0,n=an.length;n>e;e++)if(an[e][1].exec(a)){t._f+=an[e][0];break}a.match(Ee)&&(t._f+="Z"),q(t)}else t._isValid=!1}function K(t){B(t),t._isValid===!1&&(delete t._isValid,De.createFromInputFallback(t))}function te(t,e){var n,a=[];for(n=0;n<t.length;++n)a.push(e(t[n],n));return a}function ee(e){var n,a=e._i;a===t?e._d=new Date:M(a)?e._d=new Date(+a):null!==(n=Ce.exec(a))?e._d=new Date(+n[1]):"string"==typeof a?K(e):k(a)?(e._a=te(a.slice(0),function(t){return parseInt(t,10)}),$(e)):"object"==typeof a?V(e):"number"==typeof a?e._d=new Date(a):De.createFromInputFallback(e)}function ne(t,e,n,a,s,i,r){var o=new Date(t,e,n,a,s,i,r);return 1970>t&&o.setFullYear(t),o}function ae(t){var e=new Date(Date.UTC.apply(null,arguments));return 1970>t&&e.setUTCFullYear(t),e}function se(t,e){if("string"==typeof t)if(isNaN(t)){if(t=e.weekdaysParse(t),"number"!=typeof t)return null}else t=parseInt(t,10);return t}function ie(t,e,n,a,s){return s.relativeTime(e||1,!!n,t,a)}function re(t,e,n){var a=De.duration(t).abs(),s=Me(a.as("s")),i=Me(a.as("m")),r=Me(a.as("h")),o=Me(a.as("d")),u=Me(a.as("M")),c=Me(a.as("y")),d=s<dn.s&&["s",s]||1===i&&["m"]||i<dn.m&&["mm",i]||1===r&&["h"]||r<dn.h&&["hh",r]||1===o&&["d"]||o<dn.d&&["dd",o]||1===u&&["M"]||u<dn.M&&["MM",u]||1===c&&["y"]||["yy",c];return d[2]=e,d[3]=+t>0,d[4]=n,ie.apply({},d)}function oe(t,e,n){var a,s=n-e,i=n-t.day();return i>s&&(i-=7),s-7>i&&(i+=7),a=De(t).add(i,"d"),{week:Math.ceil(a.dayOfYear()/7),year:a.year()}}function ue(t,e,n,a,s){var i,r,o=ae(t,0,1).getUTCDay();return o=0===o?7:o,n=null!=n?n:s,i=s-o+(o>a?7:0)-(s>o?7:0),r=7*(e-1)+(n-s)+i+1,{year:r>0?t:t-1,dayOfYear:r>0?r:W(t-1)+r}}function ce(e){var n=e._i,a=e._f;return e._locale=e._locale||De.localeData(e._l),null===n||a===t&&""===n?De.invalid({nullInput:!0}):("string"==typeof n&&(e._i=n=e._locale.preparse(n)),De.isMoment(n)?new d(n,!0):(a?k(a)?X(e):q(e):ee(e),new d(e)))}function de(t,e){var n,a;if(1===e.length&&k(e[0])&&(e=e[0]),!e.length)return De();for(n=e[0],a=1;a<e.length;++a)e[a][t](n)&&(n=e[a]);return n}function le(t,e){var n;return"string"==typeof e&&(e=t.localeData().monthsParse(e),"number"!=typeof e)?t:(n=Math.min(t.date(),T(t.year(),e)),t._d["set"+(t._isUTC?"UTC":"")+"Month"](e,n),t)}function he(t,e){return t._d["get"+(t._isUTC?"UTC":"")+e]()}function fe(t,e,n){return"Month"===e?le(t,n):t._d["set"+(t._isUTC?"UTC":"")+e](n)}function me(t,e){return function(n){return null!=n?(fe(this,t,n),De.updateOffset(this,e),this):he(this,t)}}function _e(t){return 400*t/146097}function pe(t){return 146097*t/400}function ye(t){De.duration.fn[t]=function(){return this._data[t]}}for(var De,ge,ke="2.8.3",Me=Math.round,Ye=Object.prototype.hasOwnProperty,we=0,ve=1,be=2,Se=3,Te=4,Oe=5,We=6,Ue={},Fe=[],Ge="undefined"!=typeof module&&module.exports,Ce=/^\/?Date\((\-?\d+)/i,ze=/(\-)?(?:(\d*)\.)?(\d+)\:(\d+)(?:\:(\d+)\.?(\d{3})?)?/,xe=/^(-)?P(?:(?:([0-9,.]*)Y)?(?:([0-9,.]*)M)?(?:([0-9,.]*)D)?(?:T(?:([0-9,.]*)H)?(?:([0-9,.]*)M)?(?:([0-9,.]*)S)?)?|([0-9,.]*)W)$/,Ie=/(\[[^\[]*\])|(\\)?(Mo|MM?M?M?|Do|DDDo|DD?D?D?|ddd?d?|do?|w[o|w]?|W[o|W]?|Q|YYYYYY|YYYYY|YYYY|YY|gg(ggg?)?|GG(GGG?)?|e|E|a|A|hh?|HH?|mm?|ss?|S{1,4}|X|zz?|ZZ?|.)/g,He=/(\[[^\[]*\])|(\\)?(LT|LL?L?L?|l{1,4})/g,Le=/\d\d?/,Pe=/\d{1,3}/,Ae=/\d{1,4}/,Ne=/[+\-]?\d{1,6}/,Ze=/\d+/,je=/[0-9]*['a-z\u00A0-\u05FF\u0700-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+|[\u0600-\u06FF\/]+(\s*?[\u0600-\u06FF]+){1,2}/i,Ee=/Z|[\+\-]\d\d:?\d\d/gi,$e=/T/i,Ve=/[\+\-]?\d+(\.\d{1,3})?/,Je=/\d{1,2}/,qe=/\d/,Qe=/\d\d/,Re=/\d{3}/,Xe=/\d{4}/,Be=/[+-]?\d{6}/,Ke=/[+-]?\d+/,tn=/^\s*(?:[+-]\d{6}|\d{4})-(?:(\d\d-\d\d)|(W\d\d$)|(W\d\d-\d)|(\d\d\d))((T| )(\d\d(:\d\d(:\d\d(\.\d+)?)?)?)?([\+\-]\d\d(?::?\d\d)?|\s*Z)?)?$/,en="YYYY-MM-DDTHH:mm:ssZ",nn=[["YYYYYY-MM-DD",/[+-]\d{6}-\d{2}-\d{2}/],["YYYY-MM-DD",/\d{4}-\d{2}-\d{2}/],["GGGG-[W]WW-E",/\d{4}-W\d{2}-\d/],["GGGG-[W]WW",/\d{4}-W\d{2}/],["YYYY-DDD",/\d{4}-\d{3}/]],an=[["HH:mm:ss.SSSS",/(T| )\d\d:\d\d:\d\d\.\d+/],["HH:mm:ss",/(T| )\d\d:\d\d:\d\d/],["HH:mm",/(T| )\d\d:\d\d/],["HH",/(T| )\d\d/]],sn=/([\+\-]|\d\d)/gi,rn=("Date|Hours|Minutes|Seconds|Milliseconds".split("|"),{Milliseconds:1,Seconds:1e3,Minutes:6e4,Hours:36e5,Days:864e5,Months:2592e6,Years:31536e6}),on={ms:"millisecond",s:"second",m:"minute",h:"hour",d:"day",D:"date",w:"week",W:"isoWeek",M:"month",Q:"quarter",y:"year",DDD:"dayOfYear",e:"weekday",E:"isoWeekday",gg:"weekYear",GG:"isoWeekYear"},un={dayofyear:"dayOfYear",isoweekday:"isoWeekday",isoweek:"isoWeek",weekyear:"weekYear",isoweekyear:"isoWeekYear"},cn={},dn={s:45,m:45,h:22,d:26,M:11},ln="DDD w W M D d".split(" "),hn="M D H h m s w W".split(" "),fn={M:function(){return this.month()+1},MMM:function(t){return this.localeData().monthsShort(this,t)},MMMM:function(t){return this.localeData().months(this,t)},D:function(){return this.date()},DDD:function(){return this.dayOfYear()},d:function(){return this.day()},dd:function(t){return this.localeData().weekdaysMin(this,t)},ddd:function(t){return this.localeData().weekdaysShort(this,t)},dddd:function(t){return this.localeData().weekdays(this,t)},w:function(){return this.week()},W:function(){return this.isoWeek()},YY:function(){return _(this.year()%100,2)},YYYY:function(){return _(this.year(),4)},YYYYY:function(){return _(this.year(),5)},YYYYYY:function(){var t=this.year(),e=t>=0?"+":"-";return e+_(Math.abs(t),6)},gg:function(){return _(this.weekYear()%100,2)},gggg:function(){return _(this.weekYear(),4)},ggggg:function(){return _(this.weekYear(),5)},GG:function(){return _(this.isoWeekYear()%100,2)},GGGG:function(){return _(this.isoWeekYear(),4)},GGGGG:function(){return _(this.isoWeekYear(),5)},e:function(){return this.weekday()},E:function(){return this.isoWeekday()},a:function(){return this.localeData().meridiem(this.hours(),this.minutes(),!0)},A:function(){return this.localeData().meridiem(this.hours(),this.minutes(),!1)},H:function(){return this.hours()},h:function(){return this.hours()%12||12},m:function(){return this.minutes()},s:function(){return this.seconds()},S:function(){return S(this.milliseconds()/100)},SS:function(){return _(S(this.milliseconds()/10),2)},SSS:function(){return _(this.milliseconds(),3)},SSSS:function(){return _(this.milliseconds(),3)},Z:function(){var t=-this.zone(),e="+";return 0>t&&(t=-t,e="-"),e+_(S(t/60),2)+":"+_(S(t)%60,2)},ZZ:function(){var t=-this.zone(),e="+";return 0>t&&(t=-t,e="-"),e+_(S(t/60),2)+_(S(t)%60,2)},z:function(){return this.zoneAbbr()},zz:function(){return this.zoneName()},X:function(){return this.unix()},Q:function(){return this.quarter()}},mn={},_n=["months","monthsShort","weekdays","weekdaysShort","weekdaysMin"];ln.length;)ge=ln.pop(),fn[ge+"o"]=u(fn[ge],ge);for(;hn.length;)ge=hn.pop(),fn[ge+ge]=o(fn[ge],2);fn.DDDD=o(fn.DDD,3),h(c.prototype,{set:function(t){var e,n;for(n in t)e=t[n],"function"==typeof e?this[n]=e:this["_"+n]=e},_months:"January_February_March_April_May_June_July_August_September_October_November_December".split("_"),months:function(t){return this._months[t.month()]},_monthsShort:"Jan_Feb_Mar_Apr_May_Jun_Jul_Aug_Sep_Oct_Nov_Dec".split("_"),monthsShort:function(t){return this._monthsShort[t.month()]},monthsParse:function(t){var e,n,a;for(this._monthsParse||(this._monthsParse=[]),e=0;12>e;e++)if(this._monthsParse[e]||(n=De.utc([2e3,e]),a="^"+this.months(n,"")+"|^"+this.monthsShort(n,""),this._monthsParse[e]=new RegExp(a.replace(".",""),"i")),this._monthsParse[e].test(t))return e},_weekdays:"Sunday_Monday_Tuesday_Wednesday_Thursday_Friday_Saturday".split("_"),weekdays:function(t){return this._weekdays[t.day()]},_weekdaysShort:"Sun_Mon_Tue_Wed_Thu_Fri_Sat".split("_"),weekdaysShort:function(t){return this._weekdaysShort[t.day()]},_weekdaysMin:"Su_Mo_Tu_We_Th_Fr_Sa".split("_"),weekdaysMin:function(t){return this._weekdaysMin[t.day()]},weekdaysParse:function(t){var e,n,a;for(this._weekdaysParse||(this._weekdaysParse=[]),e=0;7>e;e++)if(this._weekdaysParse[e]||(n=De([2e3,1]).day(e),a="^"+this.weekdays(n,"")+"|^"+this.weekdaysShort(n,"")+"|^"+this.weekdaysMin(n,""),this._weekdaysParse[e]=new RegExp(a.replace(".",""),"i")),this._weekdaysParse[e].test(t))return e},_longDateFormat:{LT:"h:mm A",L:"MM/DD/YYYY",LL:"MMMM D, YYYY",LLL:"MMMM D, YYYY LT",LLLL:"dddd, MMMM D, YYYY LT"},longDateFormat:function(t){var e=this._longDateFormat[t];return!e&&this._longDateFormat[t.toUpperCase()]&&(e=this._longDateFormat[t.toUpperCase()].replace(/MMMM|MM|DD|dddd/g,function(t){return t.slice(1)}),this._longDateFormat[t]=e),e},isPM:function(t){return"p"===(t+"").toLowerCase().charAt(0)},_meridiemParse:/[ap]\.?m?\.?/i,meridiem:function(t,e,n){return t>11?n?"pm":"PM":n?"am":"AM"},_calendar:{sameDay:"[Today at] LT",nextDay:"[Tomorrow at] LT",nextWeek:"dddd [at] LT",lastDay:"[Yesterday at] LT",lastWeek:"[Last] dddd [at] LT",sameElse:"L"},calendar:function(t,e){var n=this._calendar[t];return"function"==typeof n?n.apply(e):n},_relativeTime:{future:"in %s",past:"%s ago",s:"a few seconds",m:"a minute",mm:"%d minutes",h:"an hour",hh:"%d hours",d:"a day",dd:"%d days",M:"a month",MM:"%d months",y:"a year",yy:"%d years"},relativeTime:function(t,e,n,a){var s=this._relativeTime[n];return"function"==typeof s?s(t,e,n,a):s.replace(/%d/i,t)},pastFuture:function(t,e){var n=this._relativeTime[t>0?"future":"past"];return"function"==typeof n?n(e):n.replace(/%s/i,e)},ordinal:function(t){return this._ordinal.replace("%d",t)},_ordinal:"%d",preparse:function(t){return t},postformat:function(t){return t},week:function(t){return oe(t,this._week.dow,this._week.doy).week},_week:{dow:0,doy:6},_invalidDate:"Invalid date",invalidDate:function(){return this._invalidDate}}),De=function(e,n,s,i){var r;return"boolean"==typeof s&&(i=s,s=t),r={},r._isAMomentObject=!0,r._i=e,r._f=n,r._l=s,r._strict=i,r._isUTC=!1,r._pf=a(),ce(r)},De.suppressDeprecationWarnings=!1,De.createFromInputFallback=i("moment construction falls back to js Date. This is discouraged and will be removed in upcoming major release. Please refer to https://github.com/moment/moment/issues/1407 for more info.",function(t){t._d=new Date(t._i)}),De.min=function(){var t=[].slice.call(arguments,0);return de("isBefore",t)},De.max=function(){var t=[].slice.call(arguments,0);return de("isAfter",t)},De.utc=function(e,n,s,i){var r;return"boolean"==typeof s&&(i=s,s=t),r={},r._isAMomentObject=!0,r._useUTC=!0,r._isUTC=!0,r._l=s,r._i=e,r._f=n,r._strict=i,r._pf=a(),ce(r).utc()},De.unix=function(t){return De(1e3*t)},De.duration=function(t,e){var a,s,i,r,o=t,u=null;return De.isDuration(t)?o={ms:t._milliseconds,d:t._days,M:t._months}:"number"==typeof t?(o={},e?o[e]=t:o.milliseconds=t):(u=ze.exec(t))?(a="-"===u[1]?-1:1,o={y:0,d:S(u[be])*a,h:S(u[Se])*a,m:S(u[Te])*a,s:S(u[Oe])*a,ms:S(u[We])*a}):(u=xe.exec(t))?(a="-"===u[1]?-1:1,i=function(t){var e=t&&parseFloat(t.replace(",","."));return(isNaN(e)?0:e)*a},o={y:i(u[2]),M:i(u[3]),d:i(u[4]),h:i(u[5]),m:i(u[6]),s:i(u[7]),w:i(u[8])}):"object"==typeof o&&("from"in o||"to"in o)&&(r=y(De(o.from),De(o.to)),o={},o.ms=r.milliseconds,o.M=r.months),s=new l(o),De.isDuration(t)&&n(t,"_locale")&&(s._locale=t._locale),s},De.version=ke,De.defaultFormat=en,De.ISO_8601=function(){},De.momentProperties=Fe,De.updateOffset=function(){},De.relativeTimeThreshold=function(e,n){return dn[e]===t?!1:n===t?dn[e]:(dn[e]=n,!0)},De.lang=i("moment.lang is deprecated. Use moment.locale instead.",function(t,e){return De.locale(t,e)}),De.locale=function(t,e){var n;return t&&(n="undefined"!=typeof e?De.defineLocale(t,e):De.localeData(t),n&&(De.duration._locale=De._locale=n)),De._locale._abbr},De.defineLocale=function(t,e){return null!==e?(e.abbr=t,Ue[t]||(Ue[t]=new c),Ue[t].set(e),De.locale(t),Ue[t]):(delete Ue[t],null)},De.langData=i("moment.langData is deprecated. Use moment.localeData instead.",function(t){return De.localeData(t)}),De.localeData=function(t){var e;if(t&&t._locale&&t._locale._abbr&&(t=t._locale._abbr),!t)return De._locale;if(!k(t)){if(e=x(t))return e;t=[t]}return z(t)},De.isMoment=function(t){return t instanceof d||null!=t&&n(t,"_isAMomentObject")},De.isDuration=function(t){return t instanceof l};for(ge=_n.length-1;ge>=0;--ge)b(_n[ge]);De.normalizeUnits=function(t){return w(t)},De.invalid=function(t){var e=De.utc(0/0);return null!=t?h(e._pf,t):e._pf.userInvalidated=!0,e},De.parseZone=function(){return De.apply(null,arguments).parseZone()},De.parseTwoDigitYear=function(t){return S(t)+(S(t)>68?1900:2e3)},h(De.fn=d.prototype,{clone:function(){return De(this)},valueOf:function(){return+this._d+6e4*(this._offset||0)},unix:function(){return Math.floor(+this/1e3)},toString:function(){return this.clone().locale("en").format("ddd MMM DD YYYY HH:mm:ss [GMT]ZZ")},toDate:function(){return this._offset?new Date(+this):this._d},toISOString:function(){var t=De(this).utc();return 0<t.year()&&t.year()<=9999?P(t,"YYYY-MM-DD[T]HH:mm:ss.SSS[Z]"):P(t,"YYYYYY-MM-DD[T]HH:mm:ss.SSS[Z]")},toArray:function(){var t=this;return[t.year(),t.month(),t.date(),t.hours(),t.minutes(),t.seconds(),t.milliseconds()]},isValid:function(){return G(this)},isDSTShifted:function(){return this._a?this.isValid()&&Y(this._a,(this._isUTC?De.utc(this._a):De(this._a)).toArray())>0:!1},parsingFlags:function(){return h({},this._pf)},invalidAt:function(){return this._pf.overflow},utc:function(t){return this.zone(0,t)},local:function(t){return this._isUTC&&(this.zone(0,t),this._isUTC=!1,t&&this.add(this._dateTzOffset(),"m")),this},format:function(t){var e=P(this,t||De.defaultFormat);return this.localeData().postformat(e)},add:D(1,"add"),subtract:D(-1,"subtract"),diff:function(t,e,n){var a,s,i,r=I(t,this),o=6e4*(this.zone()-r.zone());return e=w(e),"year"===e||"month"===e?(a=432e5*(this.daysInMonth()+r.daysInMonth()),s=12*(this.year()-r.year())+(this.month()-r.month()),i=this-De(this).startOf("month")-(r-De(r).startOf("month")),i-=6e4*(this.zone()-De(this).startOf("month").zone()-(r.zone()-De(r).startOf("month").zone())),s+=i/a,"year"===e&&(s/=12)):(a=this-r,s="second"===e?a/1e3:"minute"===e?a/6e4:"hour"===e?a/36e5:"day"===e?(a-o)/864e5:"week"===e?(a-o)/6048e5:a),n?s:m(s)},from:function(t,e){return De.duration({to:this,from:t}).locale(this.locale()).humanize(!e)},fromNow:function(t){return this.from(De(),t)},calendar:function(t){var e=t||De(),n=I(e,this).startOf("day"),a=this.diff(n,"days",!0),s=-6>a?"sameElse":-1>a?"lastWeek":0>a?"lastDay":1>a?"sameDay":2>a?"nextDay":7>a?"nextWeek":"sameElse";return this.format(this.localeData().calendar(s,this))},isLeapYear:function(){return U(this.year())},isDST:function(){return this.zone()<this.clone().month(0).zone()||this.zone()<this.clone().month(5).zone()},day:function(t){var e=this._isUTC?this._d.getUTCDay():this._d.getDay();return null!=t?(t=se(t,this.localeData()),this.add(t-e,"d")):e},month:me("Month",!0),startOf:function(t){switch(t=w(t)){case"year":this.month(0);case"quarter":case"month":this.date(1);case"week":case"isoWeek":case"day":this.hours(0);case"hour":this.minutes(0);case"minute":this.seconds(0);case"second":this.milliseconds(0)}return"week"===t?this.weekday(0):"isoWeek"===t&&this.isoWeekday(1),"quarter"===t&&this.month(3*Math.floor(this.month()/3)),this},endOf:function(t){return t=w(t),this.startOf(t).add(1,"isoWeek"===t?"week":t).subtract(1,"ms")},isAfter:function(t,e){return e=w("undefined"!=typeof e?e:"millisecond"),"millisecond"===e?(t=De.isMoment(t)?t:De(t),+this>+t):+this.clone().startOf(e)>+De(t).startOf(e)},isBefore:function(t,e){return e=w("undefined"!=typeof e?e:"millisecond"),"millisecond"===e?(t=De.isMoment(t)?t:De(t),+t>+this):+this.clone().startOf(e)<+De(t).startOf(e)},isSame:function(t,e){return e=w(e||"millisecond"),"millisecond"===e?(t=De.isMoment(t)?t:De(t),+this===+t):+this.clone().startOf(e)===+I(t,this).startOf(e)},min:i("moment().min is deprecated, use moment.min instead. https://github.com/moment/moment/issues/1548",function(t){return t=De.apply(null,arguments),this>t?this:t}),max:i("moment().max is deprecated, use moment.max instead. https://github.com/moment/moment/issues/1548",function(t){return t=De.apply(null,arguments),t>this?this:t}),zone:function(t,e){var n,a=this._offset||0;return null==t?this._isUTC?a:this._dateTzOffset():("string"==typeof t&&(t=Z(t)),Math.abs(t)<16&&(t=60*t),!this._isUTC&&e&&(n=this._dateTzOffset()),this._offset=t,this._isUTC=!0,null!=n&&this.subtract(n,"m"),a!==t&&(!e||this._changeInProgress?g(this,De.duration(a-t,"m"),1,!1):this._changeInProgress||(this._changeInProgress=!0,De.updateOffset(this,!0),this._changeInProgress=null)),this)},zoneAbbr:function(){return this._isUTC?"UTC":""},zoneName:function(){return this._isUTC?"Coordinated Universal Time":""},parseZone:function(){return this._tzm?this.zone(this._tzm):"string"==typeof this._i&&this.zone(this._i),this
},hasAlignedHourOffset:function(t){return t=t?De(t).zone():0,(this.zone()-t)%60===0},daysInMonth:function(){return T(this.year(),this.month())},dayOfYear:function(t){var e=Me((De(this).startOf("day")-De(this).startOf("year"))/864e5)+1;return null==t?e:this.add(t-e,"d")},quarter:function(t){return null==t?Math.ceil((this.month()+1)/3):this.month(3*(t-1)+this.month()%3)},weekYear:function(t){var e=oe(this,this.localeData()._week.dow,this.localeData()._week.doy).year;return null==t?e:this.add(t-e,"y")},isoWeekYear:function(t){var e=oe(this,1,4).year;return null==t?e:this.add(t-e,"y")},week:function(t){var e=this.localeData().week(this);return null==t?e:this.add(7*(t-e),"d")},isoWeek:function(t){var e=oe(this,1,4).week;return null==t?e:this.add(7*(t-e),"d")},weekday:function(t){var e=(this.day()+7-this.localeData()._week.dow)%7;return null==t?e:this.add(t-e,"d")},isoWeekday:function(t){return null==t?this.day()||7:this.day(this.day()%7?t:t-7)},isoWeeksInYear:function(){return O(this.year(),1,4)},weeksInYear:function(){var t=this.localeData()._week;return O(this.year(),t.dow,t.doy)},get:function(t){return t=w(t),this[t]()},set:function(t,e){return t=w(t),"function"==typeof this[t]&&this[t](e),this},locale:function(e){var n;return e===t?this._locale._abbr:(n=De.localeData(e),null!=n&&(this._locale=n),this)},lang:i("moment().lang() is deprecated. Use moment().localeData() instead.",function(e){return e===t?this.localeData():this.locale(e)}),localeData:function(){return this._locale},_dateTzOffset:function(){return 15*Math.round(this._d.getTimezoneOffset()/15)}}),De.fn.millisecond=De.fn.milliseconds=me("Milliseconds",!1),De.fn.second=De.fn.seconds=me("Seconds",!1),De.fn.minute=De.fn.minutes=me("Minutes",!1),De.fn.hour=De.fn.hours=me("Hours",!0),De.fn.date=me("Date",!0),De.fn.dates=i("dates accessor is deprecated. Use date instead.",me("Date",!0)),De.fn.year=me("FullYear",!0),De.fn.years=i("years accessor is deprecated. Use year instead.",me("FullYear",!0)),De.fn.days=De.fn.day,De.fn.months=De.fn.month,De.fn.weeks=De.fn.week,De.fn.isoWeeks=De.fn.isoWeek,De.fn.quarters=De.fn.quarter,De.fn.toJSON=De.fn.toISOString,h(De.duration.fn=l.prototype,{_bubble:function(){var t,e,n,a=this._milliseconds,s=this._days,i=this._months,r=this._data,o=0;r.milliseconds=a%1e3,t=m(a/1e3),r.seconds=t%60,e=m(t/60),r.minutes=e%60,n=m(e/60),r.hours=n%24,s+=m(n/24),o=m(_e(s)),s-=m(pe(o)),i+=m(s/30),s%=30,o+=m(i/12),i%=12,r.days=s,r.months=i,r.years=o},abs:function(){return this._milliseconds=Math.abs(this._milliseconds),this._days=Math.abs(this._days),this._months=Math.abs(this._months),this._data.milliseconds=Math.abs(this._data.milliseconds),this._data.seconds=Math.abs(this._data.seconds),this._data.minutes=Math.abs(this._data.minutes),this._data.hours=Math.abs(this._data.hours),this._data.months=Math.abs(this._data.months),this._data.years=Math.abs(this._data.years),this},weeks:function(){return m(this.days()/7)},valueOf:function(){return this._milliseconds+864e5*this._days+this._months%12*2592e6+31536e6*S(this._months/12)},humanize:function(t){var e=re(this,!t,this.localeData());return t&&(e=this.localeData().pastFuture(+this,e)),this.localeData().postformat(e)},add:function(t,e){var n=De.duration(t,e);return this._milliseconds+=n._milliseconds,this._days+=n._days,this._months+=n._months,this._bubble(),this},subtract:function(t,e){var n=De.duration(t,e);return this._milliseconds-=n._milliseconds,this._days-=n._days,this._months-=n._months,this._bubble(),this},get:function(t){return t=w(t),this[t.toLowerCase()+"s"]()},as:function(t){var e,n;if(t=w(t),"month"===t||"year"===t)return e=this._days+this._milliseconds/864e5,n=this._months+12*_e(e),"month"===t?n:n/12;switch(e=this._days+pe(this._months/12),t){case"week":return e/7+this._milliseconds/6048e5;case"day":return e+this._milliseconds/864e5;case"hour":return 24*e+this._milliseconds/36e5;case"minute":return 24*e*60+this._milliseconds/6e4;case"second":return 24*e*60*60+this._milliseconds/1e3;case"millisecond":return Math.floor(24*e*60*60*1e3)+this._milliseconds;default:throw new Error("Unknown unit "+t)}},lang:De.fn.lang,locale:De.fn.locale,toIsoString:i("toIsoString() is deprecated. Please use toISOString() instead (notice the capitals)",function(){return this.toISOString()}),toISOString:function(){var t=Math.abs(this.years()),e=Math.abs(this.months()),n=Math.abs(this.days()),a=Math.abs(this.hours()),s=Math.abs(this.minutes()),i=Math.abs(this.seconds()+this.milliseconds()/1e3);return this.asSeconds()?(this.asSeconds()<0?"-":"")+"P"+(t?t+"Y":"")+(e?e+"M":"")+(n?n+"D":"")+(a||s||i?"T":"")+(a?a+"H":"")+(s?s+"M":"")+(i?i+"S":""):"P0D"},localeData:function(){return this._locale}}),De.duration.fn.toString=De.duration.fn.toISOString;for(ge in rn)n(rn,ge)&&ye(ge.toLowerCase());return De.duration.fn.asMilliseconds=function(){return this.as("ms")},De.duration.fn.asSeconds=function(){return this.as("s")},De.duration.fn.asMinutes=function(){return this.as("m")},De.duration.fn.asHours=function(){return this.as("h")},De.duration.fn.asDays=function(){return this.as("d")},De.duration.fn.asWeeks=function(){return this.as("weeks")},De.duration.fn.asMonths=function(){return this.as("M")},De.duration.fn.asYears=function(){return this.as("y")},De.locale("en",{ordinal:function(t){var e=t%10,n=1===S(t%100/10)?"th":1===e?"st":2===e?"nd":3===e?"rd":"th";return t+n}}),De}.call(this),t.Utils.moment=n,t.datepicker});
/*! UIkit 2.26.4 | http://www.getuikit.com | (c) 2014 YOOtheme | MIT License */
!function(t){var e;window.UIkit&&(e=t(UIkit)),"function"==typeof define&&define.amd&&define("uikit-timepicker",["uikit"],function(){return e||t(UIkit)})}(function(t){"use strict";function e(t,e){t=t||0,e=e||24;var i,o,a={"12h":[],"24h":[]};for(i=t,o="";e>i;i++)o=""+i,10>i&&(o="0"+o),a["24h"].push({value:o+":00"}),a["24h"].push({value:o+":30"}),0===i&&(o=12,a["12h"].push({value:o+":00 AM"}),a["12h"].push({value:o+":30 AM"})),i>0&&13>i&&12!==i&&(a["12h"].push({value:o+":00 AM"}),a["12h"].push({value:o+":30 AM"})),i>=12&&(o-=12,0===o&&(o=12),10>o&&(o="0"+String(o)),a["12h"].push({value:o+":00 PM"}),a["12h"].push({value:o+":30 PM"}));return a}t.component("timepicker",{defaults:{format:"24h",delay:0,start:0,end:24},boot:function(){t.$html.on("focus.timepicker.uikit","[data-uk-timepicker]",function(){var e=t.$(this);if(!e.data("timepicker")){var i=t.timepicker(e,t.Utils.options(e.attr("data-uk-timepicker")));setTimeout(function(){i.autocomplete.input.focus()},40)}})},init:function(){var i,o=this,a=e(this.options.start,this.options.end);this.options.minLength=0,this.options.template='<ul class="uk-nav uk-nav-autocomplete uk-autocomplete-results">{{~items}}<li data-value="{{$item.value}}"><a>{{$item.value}}</a></li>{{/items}}</ul>',this.options.source=function(t){t(a[o.options.format]||a["12h"])},this.element.is("input")?(this.element.wrap('<div class="uk-autocomplete"></div>'),i=this.element.parent()):i=this.element.addClass("uk-autocomplete"),this.autocomplete=t.autocomplete(i,this.options),this.autocomplete.dropdown.addClass("uk-dropdown-small uk-dropdown-scrollable"),this.autocomplete.on("show.uk.autocomplete",function(){var t=o.autocomplete.dropdown.find('[data-value="'+o.autocomplete.input.val()+'"]');setTimeout(function(){o.autocomplete.pick(t,!0)},10)}),this.autocomplete.input.on("focus",function(){o.autocomplete.value=Math.random(),o.autocomplete.triggercomplete()}).on("blur",t.Utils.debounce(function(){o.checkTime()},100)),this.element.data("timepicker",this)},checkTime:function(){var t,e,i,o,a="AM",u=this.autocomplete.input.val();"12h"==this.options.format?(t=u.split(" "),e=t[0].split(":"),a=t[1]):e=u.split(":"),i=parseInt(e[0],10),o=parseInt(e[1],10),isNaN(i)&&(i=0),isNaN(o)&&(o=0),"12h"==this.options.format?(i>12?i=12:0>i&&(i=12),"am"===a||"a"===a?a="AM":("pm"===a||"p"===a)&&(a="PM"),"AM"!==a&&"PM"!==a&&(a="AM")):i>=24?i=23:0>i&&(i=0),0>o?o=0:o>=60&&(o=0),this.autocomplete.input.val(this.formatTime(i,o,a)).trigger("change")},formatTime:function(t,e,i){return t=10>t?"0"+t:t,e=10>e?"0"+e:e,t+":"+e+("12h"==this.options.format?" "+i:"")}})});
/*! UIkit 2.26.4 | http://www.getuikit.com | (c) 2014 YOOtheme | MIT License */
!function(t){var e;window.UIkit&&(e=t(UIkit)),"function"==typeof define&&define.amd&&define("uikit-autocomplete",["uikit"],function(){return e||t(UIkit)})}(function(t){"use strict";var e;return t.component("autocomplete",{defaults:{minLength:3,param:"search",method:"post",delay:300,loadingClass:"uk-loading",flipDropdown:!1,skipClass:"uk-skip",hoverClass:"uk-active",source:null,renderer:null,template:'<ul class="uk-nav uk-nav-autocomplete uk-autocomplete-results">{{~items}}<li data-value="{{$item.value}}"><a>{{$item.value}}</a></li>{{/items}}</ul>'},visible:!1,value:null,selected:null,boot:function(){t.$html.on("focus.autocomplete.uikit","[data-uk-autocomplete]",function(){var e=t.$(this);e.data("autocomplete")||t.autocomplete(e,t.Utils.options(e.attr("data-uk-autocomplete")))}),t.$html.on("click.autocomplete.uikit",function(t){e&&t.target!=e.input[0]&&e.hide()})},init:function(){var e=this,i=!1,s=t.Utils.debounce(function(){return i?i=!1:(e.handle(),void 0)},this.options.delay);this.dropdown=this.find(".uk-dropdown"),this.template=this.find('script[type="text/autocomplete"]').html(),this.template=t.Utils.template(this.template||this.options.template),this.input=this.find("input:first").attr("autocomplete","off"),this.dropdown.length||(this.dropdown=t.$('<div class="uk-dropdown"></div>').appendTo(this.element)),this.options.flipDropdown&&this.dropdown.addClass("uk-dropdown-flip"),this.dropdown.attr("aria-expanded","false"),this.input.on({keydown:function(t){if(t&&t.which&&!t.shiftKey)switch(t.which){case 13:i=!0,e.selected&&(t.preventDefault(),e.select());break;case 38:t.preventDefault(),e.pick("prev",!0);break;case 40:t.preventDefault(),e.pick("next",!0);break;case 27:case 9:e.hide()}},keyup:s}),this.dropdown.on("click",".uk-autocomplete-results > *",function(){e.select()}),this.dropdown.on("mouseover",".uk-autocomplete-results > *",function(){e.pick(t.$(this))}),this.triggercomplete=s},handle:function(){var t=this,e=this.value;return this.value=this.input.val(),this.value.length<this.options.minLength?this.hide():(this.value!=e&&t.request(),this)},pick:function(e,i){var s=this,o=t.$(this.dropdown.find(".uk-autocomplete-results").children(":not(."+this.options.skipClass+")")),n=!1;if("string"==typeof e||e.hasClass(this.options.skipClass)){if("next"==e||"prev"==e){if(this.selected){var a=o.index(this.selected);n="next"==e?o.eq(a+1<o.length?a+1:0):o.eq(0>a-1?o.length-1:a-1)}else n=o["next"==e?"first":"last"]();n=t.$(n)}}else n=e;if(n&&n.length&&(this.selected=n,o.removeClass(this.options.hoverClass),this.selected.addClass(this.options.hoverClass),i)){var l=n.position().top,h=s.dropdown.scrollTop(),r=s.dropdown.height();(l>r||0>l)&&s.dropdown.scrollTop(h+l)}},select:function(){if(this.selected){var t=this.selected.data();this.trigger("selectitem.uk.autocomplete",[t,this]),t.value&&this.input.val(t.value).trigger("change"),this.hide()}},show:function(){return this.visible?void 0:(this.visible=!0,this.element.addClass("uk-open"),e&&e!==this&&e.hide(),e=this,this.dropdown.attr("aria-expanded","true"),this)},hide:function(){return this.visible?(this.visible=!1,this.element.removeClass("uk-open"),e===this&&(e=!1),this.dropdown.attr("aria-expanded","false"),this):void 0},request:function(){var e=this,i=function(t){t&&e.render(t),e.element.removeClass(e.options.loadingClass)};if(this.element.addClass(this.options.loadingClass),this.options.source){var s=this.options.source;switch(typeof this.options.source){case"function":this.options.source.apply(this,[i]);break;case"object":if(s.length){var o=[];s.forEach(function(t){t.value&&-1!=t.value.toLowerCase().indexOf(e.value.toLowerCase())&&o.push(t)}),i(o)}break;case"string":var n={};n[this.options.param]=this.value,t.$.ajax({url:this.options.source,data:n,type:this.options.method,dataType:"json"}).done(function(t){i(t||[])});break;default:i(null)}}else this.element.removeClass(e.options.loadingClass)},render:function(t){return this.dropdown.empty(),this.selected=!1,this.options.renderer?this.options.renderer.apply(this,[t]):t&&t.length&&(this.dropdown.append(this.template({items:t})),this.show(),this.trigger("show.uk.autocomplete")),this}}),t.autocomplete});
$(function() {
	$(".confirmDelete").submit(function(e) {
		if(!confirm("Are you sure you want to delete this?")) {
			
		}

		UIkit.modal.confirm("Are you sure you want to delete this?", function(){
		    return true;
		}, function() {
			e.preventDefault();
			return false;
		});
	});

	function toSlug(text)
	{
	  return text.toString().toLowerCase()
	    .replace(/\s+/g, '-')           // Replace spaces with -
	    .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
	    .replace(/\-\-+/g, '-')         // Replace multiple - with single -
	    .replace(/^-+/, '')             // Trim - from start of text
	    .replace(/-+$/, '');            // Trim - from end of text
	}

	$(".titleToSlug").change(function() {
		var slug_field= $("[name=slug]");
		if(slug_field.val()=="") {
			var new_slug = toSlug($(".titleToSlug").val());
			slug_field.val(new_slug);
		}
	});

	$(".checkSlug").change(function() {
		$.post(ROOT_URL + 'admin/post/check-slug',{ "_token": $('[name="csrf_token"]').attr('content'), 'slug': $(this).val() })
		.done(function(isSlugFree) {
			//console.log(isSlugFree);
			if(isSlugFree) {
				$(".checkSlug").removeClass("uk-form-danger");
				$(".checkSlug").addClass("uk-form-success");
			} 
			else {
				$(".checkSlug").addClass("uk-form-danger");
				$(".checkSlug").removeClass("uk-form-success");
			}
		});
	});

	function checkPublicationStatus() {
		var valueSelected = $("#publicationStatus option:selected").val();

		if(valueSelected == "publish") {
			$("[name=publish_date]").prop('disabled', false);
			$("[name=publish_time]").prop('disabled', false);
		} else {
			$("[name=publish_date]").prop('disabled', true);
			$("[name=publish_time]").prop('disabled', true);
		}
	}
	checkPublicationStatus();
	$("#publicationStatus").on('change', function (e) {
		checkPublicationStatus();
	});
});

    $(function(){
        var progressbar = $("#progressbar"),
            bar         = progressbar.find('.uk-progress-bar'),
            settings    = {

            action: ROOT_URL+'admin/file', // upload url
            params: { "_token": $('[name="csrf_token"]').attr('content') },
            allow: '*.(jpg|jpeg|gif|png|pdf|doc|docx|txt|zip)', // allow only images
            

            loadstart: function() {
                bar.css("width", "0%").text("0%");
                progressbar.removeClass("uk-hidden");
                progressbar.removeClass(" uk-progress-success");
                progressbar.addClass("uk-progress-striped uk-active");
            },

            progress: function(percent) {
                percent = Math.ceil(percent);
                bar.css("width", percent+"%").text(percent+"%");
            },

            allcomplete: function(response) {

                bar.css("width", "100%").text("100%");

            /* setTimeout(function(){
                    progressbar.addClass("uk-hidden");
                }, 250);*/
                setTimeout(function() {
                    location.reload();
                }, 1000);
               // alert("Upload Completed")
                progressbar.addClass(" uk-progress-success");
                progressbar.removeClass("uk-progress-striped uk-active");
               // console.log(response);

            }


        };

        var select = UIkit.uploadSelect($("#upload-select"), settings),
            drop   = UIkit.uploadDrop($("#upload-drop"), settings);
    });


    $(function(){
        var progressbar = $("#imageselect_progressbar"),
            bar         = progressbar.find('.uk-progress-bar'),
            settings    = {

            action: ROOT_URL+'admin/file', // upload url
            params: { "_token": $('[name="csrf_token"]').attr('content') },
            allow: '*.(jpg|jpeg|gif|png)', // allow only images
            type: 'json',
            

            loadstart: function() {
                bar.css("width", "0%").text("0%");
                progressbar.removeClass("uk-hidden");
                progressbar.removeClass("uk-progress-danger uk-progress-success");
                progressbar.addClass("uk-progress-striped uk-active");
            },

            progress: function(percent) {
                percent = Math.ceil(percent);
                bar.css("width", percent+"%").text(percent+"%");
            },

            allcomplete: function(response) {

                bar.css("width", "100%").text("100%");

            /* setTimeout(function(){
                    progressbar.addClass("uk-hidden");
                }, 250);*/
                
               // alert("Upload Completed")
               //console.log(response);
               if(response.status == "success") {
                    progressbar.addClass(" uk-progress-success uk-hidden");

                    progressbar.removeClass("uk-progress-striped uk-active");
                    
                    $("#imageselect_id").val(response.files[0].image.id);
                    $(".imageselect_preview img").attr("src",ROOT_URL+response.files[0].image.thumbnail.path);
               } 
               else {
                    progressbar.addClass(" uk-progress-danger");
                    progressbar.removeClass("uk-progress-striped uk-active");
               }
                
            }


        };

        var select = UIkit.uploadSelect($("#imageselect-upload-select"), settings),
            drop   = UIkit.uploadDrop($("#imageselect-upload-drop"), settings);

        $("#imageselect_browse_button").click(function() {
            
            var image = getImageFromModel(function(image) {
                $("#imageselect_id").val(image.id);
                $(".imageselect_preview img").attr("src",ROOT_URL+image.thumbnail.path);
            });
            
        });

    function getImageFromModel(callback) {
        var modal = UIkit.modal(".imageselect_modal");

            if ( modal.isActive() ) {
                modal.hide();
            } else {
                modal.show();
                function displayImageResults(results) {
                    resultDisplay = $("<div></div>");
                    $.each(results,function(key,image){ // for each image
                        // generate thumbnail
                      
                        var thumbnail = $('<a href="#" class="uk-thumbnail uk-thumbnail-small"></a>');
                        thumbnail.append('  <img src="'+ROOT_URL+image.thumbnail.path+'"  /> <div class="uk-thumbnail-caption">'+image.original_name+'</div>');
                        thumbnail.click(function() {
                            modal.hide();
                            return callback(image);
                            
                        });
                        resultDisplay.append(thumbnail);
                        // add to results
                    
                       // resultDisplay.append("<a href=\"#\"><img src=\""+ROOT_URL+image.image_cache_json[300].path+"\" width=\"150\" /></a></li>");
                    });
                    $(" .imageselect_images").html(resultDisplay);
                }
                
                $.get(ROOT_URL+'admin/api/images', function(response) {
                    displayImageResults(response.results);
                });
            }
    }

    });


$(function() {
	var i = 0;
	function makeUploader(button,field) {
		var settings    = {

            action: ROOT_URL+'admin/file', // upload url
            params: { "_token": $('[name="csrf_token"]').attr('content') },
            allow: '*.(jpg|jpeg|gif|png)', // allow only images
            type: 'json',
            

            loadstart: function() {
                /*bar.css("width", "0%").text("0%");
                progressbar.removeClass("uk-hidden");
                progressbar.removeClass("uk-progress-danger uk-progress-success");
                progressbar.addClass("uk-progress-striped uk-active");*/
            },

            progress: function(percent) {
                /*percent = Math.ceil(percent);
                bar.css("width", percent+"%").text(percent+"%");*/
            },

            allcomplete: function(response) {

                
               if(response.status == "success") {
               //	console.log(response.files[0].image);
                    field.val(ROOT_URL + response.files[0].image.large.path);
               } 
               else {
                 /*   progressbar.addClass(" uk-progress-danger");
                    progressbar.removeClass("uk-progress-striped uk-active");*/
               }
                
            }


        };

        UIkit.uploadSelect(button, settings);
        
	}

	function reIdSegments() {
		segmentCount = 0;
	 	$(".nd-editor-components li").each(function(index,segment) {
	 		$(segment).find("input, textarea, select").each(function(index2,component) {	
	 			if($(component).attr("name")!= undefined) {
	 				oldname = $(component).attr("name");
		 			
		 			if(oldname.substr(0,6) == "editor") {
		 				newname = "editor["+segmentCount+oldname.substr(8);
		 				$(component).attr("name",newname);
		 				console.log("> "+newname);
		 			}
		 		}
	 		});
	 		segmentCount++;
	 	});
	}

	function addComponent(ctype,value)
	{
		if(value==undefined) {value = "";}
		switch(ctype) {
			case "html":
			editArea = $('<textarea name="editor['+i+'][value]" rows="10" placeholder="Type here..." class="uk-width-1-1 ">'+value+'</textarea>');
			break;
			case "text":
			editArea = $('<div></div>');
			var textStyles = {
				p: "Paragraph",
				h1: "Heading",
				blockquote: "Quote"
			}

			styleField = $('<select name="editor['+i+'][value][class]" ></select>');
			editArea.append(styleField);
			editArea.append($('<textarea name="editor['+i+'][value][text]" rows="5" placeholder="Type here..." class="uk-width-1-1 " >'+value.text+'</textarea>'));
			
			


			$.each(textStyles,function(key,val) {
				sel = '';
				
				if(value.class == key) {
					sel = ' selected="selected"';
				}
				styleField.append('  <option value="'+key+'" '+sel+'>'+val+'</option>');
			});

			
			break;
			case "video":
			editArea = $('<span>Enter Youtube URL: </span>').append($('<input name="editor['+i+'][value]" type="text" value="'+value+'" />'));
			break;
			case "image":
			editArea = $('<div>Enter Image URL: </div>');

			field = $('<input name="editor['+i+'][value][url]" type="text" value="'+(value.url===undefined ? "" : value.url)+'" />');
			editArea.append(field);
			button = $('<a class="uk-form-file uk-button">Upload Image </a> ');
			fileField = $('<input type="file"> ');
			button.append(fileField);

			
			editArea.append(button);

			var imageStyles = {
				full: "Full Size",
				medium: "Medium",
				small: "Small"
			}

			styleField = $('<select name="editor['+i+'][value][class]" ></select>');
			editArea.append(styleField);


			$.each(imageStyles,function(key,val) {
				sel = '';
				
				if(value.class == key) {
					sel = ' selected="selected"';
				}
				styleField.append('  <option value="'+key+'" '+sel+'>'+val+'</option>');
			});
			makeUploader(fileField,field);
			
			break;
		}
		removeButton = $('<a href="#" class="uk-button uk-button-small uk-button-danger">X</a>');
		upButton = $('<a href="#" class="uk-button uk-button-small ">Up</a>');
		downButton = $('<a href="#" class="uk-button uk-button-small">Down</a>');
		controls = $('<div></div>').append(removeButton).append(upButton).append(downButton);
		removeButton.click(function(){
			$(this).parent().parent().remove();
		});
		upButton.click(function(event) {
			event.preventDefault();
			li = $(this).closest('li');
			li.insertBefore(li.prev());
			reIdSegments();
		});
		downButton.click(function(event) {
			event.preventDefault();
			li = $(this).closest('li');
			li.insertAfter(li.next());
			reIdSegments();
		});

		newComponent = $('<li class="nd-editor-c-html"><input type="hidden" name="editor['+i+'][type]" value="'+ctype+'" /></li>');
		newComponent.prepend(editArea);
		newComponent.prepend(controls);
		$(".nd-editor-components").append(newComponent);
		i++;
	}
	editor = $(".nd-editor");
	
	$(".nd-editor-add-html").click(function() {
		addComponent('html');
	});
	$(".nd-editor-add-video").click(function() {
		addComponent('video');
	});
	$(".nd-editor-add-image").click(function() {
		addComponent('image');
	});
	$(".nd-editor-add-text").click(function() {
		addComponent('text');
	});

	var slug = $("input[name=nd-editor-slug]").val();
	if(slug !="") {
		var url = ROOT_URL + 'admin/api/editor/'+slug;
		$.get(url, function(response) {
			console.log(response);
			$.each(response,function(key,component) {
				addComponent(component.type,component.value);
			});
	    });
	}

});
$(function() {
	
	$("#ndAdminUserAddStudentProfile").click(function() {
		
		var modal = UIkit.modal("#nd-select-institution-modal");

		if ( modal.isActive() ) {
		    modal.hide();
		} else {
		    modal.show();
		}
	});

	$("#ndAdminUserAddBusinessProfile").click(function() {
		$.post(ROOT_URL+"admin/api/profile/resetBusinessProfile",{  'user_id': $("#nd-user-id").val() })
		.done(function(response) {
			if(response.status=="success") {
				$("#nd-user-business-name").text(response.institution_name);
				location.reload();
			}
		});
	});

	/*UIkit.autocomplete($('#nd-select-institution-modal-autocomplete'), {
	      source: ROOT_URL + 'admin/api/institution'
	}).on('selectitem.uk.autocomplete', function (e, data, ac) {
		$("#nd-select-institution-modal-field").val(data.value);

	 });
*/
	$("#nd-select-institution-modal-add-button").click(function() {
		var id = $("#nd-select-institution-modal-field").val();
		if(id=="") {
			UIkit.notify("Please select a university");
		} 
		else
		{
			$.post(ROOT_URL+"admin/api/profile/resetStudentProfile",{  'institution_id': id, 'user_id': $("#nd-user-id").val() })
		.done(function(response) {
			if(response.status=="success") {
				$("#nd-user-institution-name").text(response.institution_name);
				modal = UIkit.modal("#nd-select-institution-modal");

				if ( modal.isActive() ) {
				    modal.hide();
				} 
			}
		});
		}
	});

});
//# sourceMappingURL=admin.js.map
