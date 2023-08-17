<x-mail::message>
# Comandă nouă de paste colorate natural! 

## Client
Nume: {{$order['name']}}<br/>
@if(!empty($order['email']))
Email: {{$order['email']}}<br/>
@endif
Telefone: {{$order['phone']}}<br/>

## Observații
<x-mail::panel>
{{$order['description']}}
</x-mail::panel>

## Produsele comandate
<x-mail::table>
| Produs | Preț unitar | Cantitate | Preț |
| :--------- | :------------- | :------------- | :------------- |
@foreach ($order['cart'] as $p)
|   {{ $p['packType'] }} de {{ $p['pastaType'] }} cu făină {{ $p['flourType'] }} și {{ $p['colorType'] }} | {{ $p['unitPrice'] }} Lei | {{ $p['quantity'] }} | {{ $p['price'] }} Lei |
@endforeach
</x-mail::table>

### Total cumpărături {{$order['totalPrice']}} Lei

@if($order['totalPrice'] < 100 )
### Transport {{$order['deliveryPrice']}} Lei
### Total {{$order['deliveryPrice'] + $order['totalPrice']}} Lei
@endif 

O zi frumoasă,<br>
Paul
</x-mail::message>
