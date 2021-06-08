@extends('store-front.layout.payments')

<h3>Make a payment</h3>

<form action="#" method="POST" id="paymentForm">
    @csrf
    <label>How much you want to pay?</label>
    <input 
        type="number" 
        min="5"
        step="0.01"
        name="value"
        value="{{ mt_rand(500, 100000) / 100 }}"
        required 
        >
    <small> Use values with up to two decimal positions, using a dot "." </small>
    <br>
    <label>Currency</label>
    <select name="currency" required>
        @foreach($currencies as $currency)
            <option value="{{ $currency->iso }}">{{ strtoupper($currency->iso) }}</option>
        @endforeach
    </select>
    <br>
     <label>Select payment platform</label>
     <select name="payment_platform" required>
        @foreach($paymentPlatforms as $paymentPlatform)
            <option value="{{ $paymentPlatform->id }}">{{ $paymentPlatform->name }}</option>
        @endforeach
     </select>
    <br>
    <button type="submit" id="payBtn">Pay</button>
</form>
