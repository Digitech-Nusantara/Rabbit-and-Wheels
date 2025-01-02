$(function() { 
    $('#search').on('keyup', function () {
        var query = $(this).val();

        // Only perform the AJAX request if there is text in the search box
        if (query.length > 0) {
            $.ajax({
                url: '/search', // Make sure this is the correct route for your items search
                type: 'GET',
                data: { search: query }, // Pass the search term to the server
				error: function(xhr, status, error) {
					console.log('AJAX Error:', error); // Log any AJAX errors
				},
                success: function(response) {
					if (response && Array.isArray(response)) {
						var dropdown = '';
						
						// Check if response contains items
						if (response.length > 0) {
							console.log(response);

							// Loop through each item in the response and display it in the dropdown
							response.forEach(function(product) {
								dropdown += '<div class="py-1" role="none">';
								dropdown += '<a href="/' + product.category + '/' + product.slug + '" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1">';
								dropdown += product.name + '</a></div>';
							});
							
							dropdown += '<a href="/all-items?search=' + query +'">Search for more...</a>';
							dropdown += '</div>';
						} else {
							dropdown = '<p class="text-gray-700 px-4 py-2">No results found</p>';
						}
					} else {
						console.error("Expected JSON array but received:", response);
                        $('#search-results').html('<div class="dropdown-item">Error: Invalid response format</div>').show();
					}

                    // Append the dropdown to the search container (adjust as needed)
                    $('#search-results').html(dropdown).show();
                }
            });
        } else {
            // If the search input is empty, hide the dropdown
            $('#search-results').empty().hide();
        }
    });
});

