<input value="{{ url('/esewa_success') }}" type="hidden" name="su">
<h2 class="text-green-700">✅ Payment Successful</h2>
<p><strong>{{ $message ?? '' }}</strong></p>
@if(isset($verified))
    <p>Verification: <span style="color:{{ $verified ? 'green' : 'red' }}">{{ $verified ? 'Success' : 'Failed' }}</span></p>
@endif
<pre>{{ print_r($data, true) }}</pre>
