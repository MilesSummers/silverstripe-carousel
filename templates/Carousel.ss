<div class="flexslider"><ul class="slides">
	<% loop SortedSlides %>
		<% if UseLink %>
			<% if ExternalLink %><li><a href="$ExternalLink"><img src="$SlideImage.URL" title="$Title"/></a><p class="flex-caption">$Title</p></li>
			<% else %><li><a href="$IntenalLink.Link">$SlideImage.PaddedImage(1092,302)</a><p class="flex-caption">$Title</p></li><% end_if %>
		<% else %><li><img src="$SlideImage.URL" title="$Title"/><p class="flex-caption">$Title</p></li><% end_if %>
	<% end_loop %>
</ul></div>
