$("#header").load("data/header.php");
$("#footer").load("data/footer.php");
(()=>{
  const LIWIDTH=
    parseFloat($("#banner").css("width"));
  var $imgs=$("[data-load=bannerImgs]"),
      $idxs=$("[data-load=bannerIdxs]");
  $.get("data/01_index/banner.php",data=>{
    data.push(data[0]);
    var html="";
    for(var img of data){
      html+=
        `<li title="${img.title}">
          <a href="${img.href}">
              <img src="${img.img}">
          </a>
        </li>`
    }
    $("[data-load=bannerImgs]")
      .html(html).css("width",LIWIDTH*data.length);
    $("[data-load=bannerIdxs]")
      .html("<li></li>".repeat(data.length-1))
      .children().first().addClass("hover");
  })
})();
(()=>{
  //所有楼层串行加载
  /*
  $.get(...)
  .then(()=>{
    return $.get(...)
  })
  .then(()=>{
    return $.get(...)
  })
  .then(()=>{输出})
  */
  //所有楼层并行加载
  Promise.all([
    $.get("data/01_index/floors.php",
          {fname:"seq_recommended"},
          data=>{
      var html="";
      for(var i=0;i<data.length;i++){
        var p=data[i];
        html+=i<3?
          `<div>
            <div class="desc">
              <p class="name">${p.title}</p>
              ${i!=2?
                '<p class="details">'+p.details+'</p>'
                :""
              }
              <p class="price">¥${p.price}</p>
              <a href="${p.href}" class="view">查看详情</a>
            </div>
            <img src="${p.pic}">
          </div>`:
          `<div class="product">
            <img src="${p.pic}">
            <p class="name">${p.title}</p>
            <p class="price">¥${p.price}</p>
            <a href="${p.href}">查看详情</a>
          </div>`
      }
      $("#f1>.floor-content").html(html);
    }),
    $.get("data/01_index/floors.php",
            {fname:"seq_new_arrival"},
            data=>{
        var html="";
        for(var i=0;i<data.length;i++){
          var p=data[i];
          html+=i<3?
            `<div>
              <div class="desc">
                <p class="name">${p.title}</p>
                ${i!=2?
                  '<p class="details">'+p.details+'</p>'
                  :""
                }
                <p class="price">¥${p.price}</p>
                <a href="${p.href}" class="view">查看详情</a>
              </div>
              <img src="${p.pic}">
            </div>`:
            `<div class="product">
              <img src="${p.pic}">
              <p class="name">${p.title}</p>
              <p class="price">¥${p.price}</p>
              <a href="${p.href}">查看详情</a>
            </div>`
        }
        $("#f2>.floor-content").html(html);
    }),
    $.get("data/01_index/floors.php",
            {fname:"seq_top_sale"},
            data=>{
        var html="";
        for(var i=0;i<data.length;i++){
          var p=data[i];
          html+=i<3?
            `<div>
              <div class="desc">
                <p class="name">${p.title}</p>
                ${i!=2?
                  '<p class="details">'+p.details+'</p>'
                  :""
                }
                <p class="price">¥${p.price}</p>
                <a href="${p.href}" class="view">查看详情</a>
              </div>
              <img src="${p.pic}">
            </div>`:
            `<div class="product">
              <img src="${p.pic}">
              <p class="name">${p.title}</p>
              <p class="price">¥${p.price}</p>
              <a href="${p.href}">查看详情</a>
            </div>`
        }
        $("#f3>.floor-content").html(html);
    }),
  ]).then(()=>{
    console.log("生成电梯按钮...");
  })
})();