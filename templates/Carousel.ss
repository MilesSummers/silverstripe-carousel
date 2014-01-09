<ul id="bxslider" class="bxslider">
	<% loop SortedSlides %>
		<li><a href="<% if External %>$ExternalLink<% else %>$IntenalLink.Link<% end_if %>"><img src="$SlideImage.URL" title="$Title"/></a></li>
	<% end_loop %>
</ul>
