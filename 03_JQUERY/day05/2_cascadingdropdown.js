$(()=>{
$.get("2_category.php")
.then(data=>{
	var $selCategory=$("#selCategory");
	var html="";
	for(var c of data){
		html+=`<option>${c.category}</option>`
	}
	$selCategory.children().last().replaceWith(html);
	$selCategory.change(e=>{
		loadNext(
			$(e.target),
			$("#selFamily"),
			"2_family.php",
			{category:$(e.target).val()},
			"family_id",
			"fname"
		).then($selFamily=>{
			$selFamily.change(e=>{
				loadNext(
					$(e.target),
					$("#selProducts"),
					"2_productsByFamily.php",
					{fid:$(e.target).val()},
					"lid",
					"title"
				)
			})
		});
		//为$selNext绑定change事件
	})
});
function loadNext(
	$selCurr,
	$selNext,
	url,
	data,
	valFieldName,
	txtFieldName
){
	return new Promise(resolve=>{
		$selCurr.nextAll()
						.children(":not(:first-child)")
						.remove();
		if($selCurr.prop("selectedIndex")>0){
			$selNext.append("<option>获取中...</option>");
			$.get(url,data)
				.then(data=>{
					var html="";
					for(var obj of data){
						html+=
							`<option value="${obj[valFieldName]}">
								${obj[txtFieldName]}
							 </option>`
					}
					$selNext.children().last()
						.replaceWith(html);
					resolve($selNext);
				})
		}
	})
}
})