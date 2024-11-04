document.addEventListener("DOMContentLoaded",()=>{let t=!1,a={cid:-999,start:-999,count:48},l=-999;function e(){window.scrollTo({top:0,behavior:"smooth"}),$(".joe_wallpaper__list").html(""),t=!0,$.ajax({url:Joe.BASE_API,type:"POST",dataType:"json",data:{routeType:"wallpaper_list",cid:a.cid,start:a.start,count:a.count},success(e){if(1!==e.code)return t=!1;t=!1;let i="";e.data.forEach(t=>{i+=`\n                        <a class="item animated bounceIn" data-fancybox="gallery" href="${t.url}">\n                            <img width="100%" height="100%" class="lazyload" src="${Joe.LAZY_LOAD}" data-src="${t.img_1024_768||t.url}" alt="壁纸">\n                        </a>`}),$(".joe_wallpaper__list").html(i),l=e.total,function(){let t="";a.start/a.count!=0&&(t+=`\n                <li class="joe_wallpaper__pagination-item" data-start="0">首页</li>\n                <li class="joe_wallpaper__pagination-item" data-start="${a.start-a.count}">\n                    <svg viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" width="12" height="12"><path d="M822.272 146.944l-396.8 396.8c-19.456 19.456-51.2 19.456-70.656 0-18.944-19.456-18.944-51.2 0-70.656l396.8-396.8c19.456-19.456 51.2-19.456 70.656 0 18.944 19.456 18.944 45.056 0 70.656z"/><path d="M745.472 940.544l-396.8-396.8c-19.456-19.456-19.456-51.2 0-70.656 19.456-19.456 51.2-19.456 70.656 0l403.456 390.144c19.456 25.6 19.456 51.2 0 76.8-26.112 19.968-51.712 19.968-77.312.512zm-564.224-63.488c0-3.584 0-7.68.512-11.264h-.512v-714.24h.512c-.512-3.584-.512-7.168-.512-11.264 0-43.008 21.504-78.336 48.128-78.336s48.128 34.816 48.128 78.336c0 3.584 0 7.68-.512 11.264h.512v714.24h-.512c.512 3.584.512 7.168.512 11.264 0 43.008-21.504 78.336-48.128 78.336s-48.128-35.328-48.128-78.336z"/></svg>\n                </li>\n                <li class="joe_wallpaper__pagination-item" data-start="${a.start-a.count}">${Math.ceil(a.start/a.count)}</li>\n            `);t+=`<li class="joe_wallpaper__pagination-item active">${Math.ceil(a.start/a.count)+1}</li>`,a.start!=l-a.count&&(t+=`\n                <li class="joe_wallpaper__pagination-item" data-start="${a.start+a.count}">${Math.ceil(a.start/a.count)+2}</li>\n                <li class="joe_wallpaper__pagination-item" data-start="${a.start+a.count}">\n                    <svg class="next" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" width="12" height="12"><path d="M822.272 146.944l-396.8 396.8c-19.456 19.456-51.2 19.456-70.656 0-18.944-19.456-18.944-51.2 0-70.656l396.8-396.8c19.456-19.456 51.2-19.456 70.656 0 18.944 19.456 18.944 45.056 0 70.656z"/><path d="M745.472 940.544l-396.8-396.8c-19.456-19.456-19.456-51.2 0-70.656 19.456-19.456 51.2-19.456 70.656 0l403.456 390.144c19.456 25.6 19.456 51.2 0 76.8-26.112 19.968-51.712 19.968-77.312.512zm-564.224-63.488c0-3.584 0-7.68.512-11.264h-.512v-714.24h.512c-.512-3.584-.512-7.168-.512-11.264 0-43.008 21.504-78.336 48.128-78.336s48.128 34.816 48.128 78.336c0 3.584 0 7.68-.512 11.264h.512v714.24h-.512c.512 3.584.512 7.168.512 11.264 0 43.008-21.504 78.336-48.128 78.336s-48.128-35.328-48.128-78.336z"/></svg>\n                </li>\n            `);a.start<l-a.count&&(t+=`<li class="joe_wallpaper__pagination-item" data-start="${l-a.count}">末页</li>`);$(".joe_wallpaper__pagination").html(t)}()}})}$.ajax({url:Joe.BASE_API,type:"POST",dataType:"json",data:{routeType:"wallpaper_type"},success(t){if(1!==t.code)return $(".joe_wallpaper__type-list").html('<li class="error">壁纸抓取失败！请联系作者！</li>');if(!t.data.length)return $(".joe_wallpaper__type-list").html('<li class="error">暂无数据！</li>');let a="";t.data.forEach(t=>a+=`<li class="item animated swing" data-cid="${t.id}">${t.name}</li>`),$(".joe_wallpaper__type-list").html(a),$(".joe_wallpaper__type-list .item").first().click()}}),$(".joe_wallpaper__type-list").on("click",".item",function(){const l=$(this).attr("data-cid");t||($(this).addClass("active").siblings().removeClass("active"),a.cid=l,a.start=0,e())}),$(".joe_wallpaper__pagination").on("click",".joe_wallpaper__pagination-item",function(){const l=$(this).attr("data-start");l&&!t&&(a.start=Number(l),e())})});