<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mpdf\Mpdf;

class PdfController extends Controller
{
	public function __invoke()
	{
		//$css = file_get_contents(public_path('css/tailwind.css'));
		$htmlContent = '<main style="max-width: 72rem; margin: 1.5rem auto; padding: 0 1rem;">';
		$htmlContent .= '<h1 style="text-align: center;">Your Cart</h1>';

		$cartItems = session('cart');
		//dd($cartItems);           
		if ($cartItems) {               
			foreach($cartItems as $id  => $details) {
				if(isset($details['photo'], $details['name'], $details['quantity'], $details['price'])) {
					$htmlContent .= '<div style="border-radius: 0.5rem; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); padding: 1.5rem; margin-bottom: 1.5rem;">
						<table style="width: 100%; border-spacing: 1rem;">
							<tr>
								<!-- Image -->
								<td style="width: 6rem; vertical-align: top; text-align: center;">
									<img src="' . $details['photo'] . '" alt="Product Image" width="100px" style="object-fit: cover; border-radius: 0.375rem;">
								</td>
								
								<!-- Name and Description -->
								<td style="vertical-align: top; padding-left: 1rem;">
									<h2 style="font-size: 1.125rem; font-weight: 600; margin-bottom: 0.5rem;">' . $details['name'] . '</h2>
									<p style="font-size: 0.875rem; color: #6b7280;">Short product description</p>
								</td>

								<!-- Quantity -->
								<td style="width: 6rem; vertical-align: top; padding-left: 1rem;">
									<label for="quantity" style="display: block; font-size: 0.875rem; color: #6b7280; margin-bottom: 0.25rem;">Quantity</label>
									<input type="number" id="quantity" value="' . $details['quantity'] . '" style="border: 1px solid #d1d5db; border-radius: 0.375rem; padding: 0.25rem 0.5rem;margin-top: 0.25rem;">
								</td>

								<!-- Price -->
								<td style="width: 6rem; vertical-align: top; padding-left: 1rem; text-align: right;">
									<p style="font-size: 1.125rem; font-weight: 700; color: #111827;">$' . $details['price'] . '</p>
								</td>
							</tr>
						</table>
					</div>';
				}
			}
		}

		$htmlContent .= '</main>';
		//$htmlContent = '<style>' . $css . '</style>' . $htmlContent;
		
		//return response($htmlContent, 200)->header('Content-Type', 'text/html');
		$mpdf = new Mpdf();
		$mpdf->WriteHTML($htmlContent);
		$mpdf->Output('cart.pdf', 'I');
	}
}
