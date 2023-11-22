@if($user->hasRole('seller'))
<x-welcome-seller :$user />
@elseif($user->hasRole('customer'))
<x-welcome-customer :$user />
@endif
