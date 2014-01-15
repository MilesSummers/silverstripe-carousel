<div class="flexslider"><ul class="slides">
	<% loop SortedSlides %>
		<li><a href="<% if External %>$ExternalLink<% else %>$IntenalLink.Link<% end_if %>"><img src="$SlideImage.URL" title="$Title"/></a><p class="flex-caption">$Title</p></li>
	<% end_loop %>
</ul></div>
