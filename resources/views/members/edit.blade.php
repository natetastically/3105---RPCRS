@extends('layout.app')

@section('content')
<div class="GIM-membersCreate">
    <h1 class="GIM-membersCreate-header">Edit Member Information</h1>
    {!! Form::open(['action' => ['CustomerController@update', $customer->id],'method'=>'POST']) !!}

    <div class="GIM-membersCreate-container">
        <div class="GIM-membersEdit-statusRadio">
            Member Status: 
            @if($customer->status=="ACTIVE")
                <h6 style="color:green">{{$customer->status}}</h6>
            @else
                <h6 style="color:red">{{$customer->status}}</h6>
            @endif
            
            
            <br>
            {{Form::label('status','Status',['class' => 'class-name-for-labels'])}} :
            <select name="status">
                <option value="ACTIVE" >ACTIVE</option>
                <option value="INACTIVE" >INACTIVE</option>
            </select> 
        </div>

        <div class="GIM-membersCreate-container-input">
        <div class="GIM-membersCreate-formAllignment">
        <div>
            {{Form::label('firstname','First Name',['class' => 'class-name-for-labels'])}}
            <br>
            {{Form::text('firstname',$customer->firstname,)}}
        </div>
        <div class="GIM-membersCreate-rightSide">
            {{Form::label('middlename','Middle Name',['class' => 'class-name-for-labels'])}}
            <br>
            {{Form::text('middlename',$customer->middlename,)}}
        </div>
        </div>

        <div class="GIM-membersCreate-formAllignment">
        <div>
            {{Form::label('lastname','Last Name',['class' => 'class-name-for-labels'])}}
            <br>
            {{Form::text('lastname',$customer->lastname,)}}
        </div>
        <div class="GIM-membersCreate-inputDate">
            {{Form::label('date_of_birth','Date of Birth',['class' => 'class-name-for-labels'])}}
            <br>
            {{Form::date('date_of_birth', $customer->date_of_birth)}}
        </div>
        </div>

        <div class="GIM-membersCreate-formAllignment">
        <div>
            {{Form::label('phone_number','Phone Number',['class' => 'class-name-for-labels'])}}
            <br>
            {{Form::text('phone_number',$customer->phone_number,)}}
        </div>
        <div class="GIM-membersCreate-rightSide">
            {{Form::label('email','E-mail',['class' => 'class-name-for-labels'])}}
            <br>
            {{Form::email('email',$customer->email)}}
        </div>
        </div>

        <div class="GIM-membersCreate-formAllignment">
        <div class="GIM-membersCreate-membershipSpace">
            {{Form::label('membership','Membership',['class' => 'class-name-for-labels'])}}
            <h4> Current Membership Plan: {{$currplan->name}} </h4>
            <select name="membership">
                @foreach($memberships as $membership)
                    <option value="{{$membership->id}}">{{$membership->name}}</option>
                @endforeach
            </select>   
        </div>
        </div>

        <div name="address">
            <div class="GIM-membersCreate-formAllignment">
            <div>
                {{Form::label('house_number','House Number',['class' => 'class-name-for-labels'])}}
                <br>
                {{Form::text('house_number',$customer->house_number,)}}
            </div>
            <div class="GIM-membersCreate-rightSide">
                {{Form::label('street_name','Street Name',['class' => 'class-name-for-labels'])}}
                <br>
                {{Form::text('street_name',$customer->street_name,)}}
            </div>
            </div>

            <div class="GIM-membersCreate-formAllignment">
            <div>
                {{Form::label('barangay','Barangay',['class' => 'class-name-for-labels'])}}
                <br>
                {{Form::text('barangay',$customer->barangay,)}}
            </div>
            <div class="GIM-membersCreate-rightSide">
                {{Form::label('municipality','Municipality',['class' => 'class-name-for-labels'])}}
                <br>
                {{Form::text('municipality',$customer->municipality,)}}
            </div>
            </div>

            <div class="GIM-membersCreate-formAllignment">
            <div>
                {{Form::label('city','City',['class' => 'class-name-for-labels'])}}
                <br>
                {{Form::text('city',$customer->city,)}}
            </div>
            <div class="GIM-membersCreate-rightSide">
                {{Form::label('province','Province',['class' => 'class-name-for-labels'])}}
                <br>
                {{Form::text('province',$customer->province,)}}
            </div>
            </div>

            <div class="GIM-membersCreate-formAllignment">
            <div class="GIM-membersCreate-inputZipCode">
                {{Form::label('zip_code','Zip Code',['class' => 'class-name-for-labels'])}}
                <br>
                {{Form::text('zip_code',$customer->zip_code,)}}
            </div>
            </div>
        </div>
        </div>


        {{Form::hidden('_method','PUT')}}
        
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Member Information</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h6>Update Gym Member #{{$customer->id}} information?</h6>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Confirm</button>
                        </div>
              </div>
            </div>
        </div>


        <div class="GIM-membersCreate-container-button">
            <button type="button" class="editUserBtn">Update Member</button>
            {!! Form::close() !!}
        </div>

    </div>
        <div class="GIM-membersCreate-goBackLink">
        <a href="/members"><div class="">Go Back</div></a>
        </div>
</div>
@endsection


@section('scripts')

        <script>
            $(document).ready(function(){
                $('.editUserBtn').click(function(e){
                    e.preventDefault();

                    $('#editModal').modal('show');
                });

            });
        </script>

@endsection