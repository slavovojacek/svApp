$(document).ready(function(){$(".radio-button").click(function(){var t=$(this).attr("data-value"),a=$(this).parent().find("input");return $(this).hasClass("disabled")?!1:(a.val(""),$(this).parent().find(".radio-button").removeClass("selected"),$(this).addClass("selected"),void a.val(t))})});