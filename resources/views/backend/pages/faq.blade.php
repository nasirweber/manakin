@extends('admin.admin_dashboard');
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">       
    <h6 class="card-title">FAQ's</h6> 
    <div class="row profile-body"> 
@php
if(!empty($faq->faq)){
    $action = '/update/faq/'.$faq->faq_id;
}else{
     $action =  'store/faq';
}
@endphp
      <form method="POST" 
             action="{{ url($action) }}" 
            class="forms-sample">
         @csrf
         <textarea class="form-control" name="faq" id="easyMdeEditor" rows="5">
          {{ (!empty($faq->faq) ? $faq->faq : "") }}
         </textarea>
         @if(isset($faq->faq))
         <button type="submit" class="btn btn-primary me-2">Update</button>
         @else
         <button type="submit" class="btn btn-primary me-2">Save</button>
         @endif
      </form>
    </div>
</div>

<!-- Plugin js for easymde NotePad textarea -->
<script src="{{ asset('backend/assets/vendors/select2/select2.min.js')}} "></script>
<script src="{{ asset('backend/assets/vendors/easymde/easymde.min.js')}} "></script>
<script src="{{ asset('backend/assets/js/email.js')}} "></script>
<!-- END Plugin js for easymde NotePad textarea -->
@endsection