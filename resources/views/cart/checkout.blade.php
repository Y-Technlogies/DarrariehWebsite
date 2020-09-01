@extends('welcome')

@section('content')
    <div class="row bg-white p-2 row">
        <form>
            <div class="form-row">
                <div class="form-group col">
                    <label for="inputEmail4">First Name</label>
                    <input type="text" class="form-control" id="inputEmail4">
                </div>
                <div class="form-group col">
                    <label for="inputPassword4">Last Name</label>
                    <input type="text" class="form-control" id="inputPassword4">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Phone</label>
                <input type="text" class="form-control" id="inputAddress">
            </div>
            <div class="form-group">
                <label for="inputAddress2">Address</label>
                <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-block btn-submit mb">Save</button>
        </form>
    </div>

@stop