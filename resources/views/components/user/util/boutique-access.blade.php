<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-8">
         <ul class="list-group">
             @foreach ($boutiques as $b)
             <x-user.util.boutique-access-item :boutique='$b' :boutiqueAccess="$getAccessBoutique($b)" :roles="$roles" />
             @endforeach
         </ul>
    </div>
</div>