@extends('admin.layouts.master')

@section('title')
    Tạo mới khuyến mãi
@endsection

@section('content')
    <form action="{{ route('admin.promotions.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Tên khuyến mãi:</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" >
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="discount_amount" class="form-label">Giảm giá (VNĐ):</label>
            <input type="number" name="discount_amount" id="discount_amount" class="form-control" value="{{ old('discount_amount') }}" step="0.01" >
            @error('discount_amount')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="code" class="form-label">Mã khuyến mãi:</label>
            <input type="text" name="code" id="code" class="form-control" value="{{ old('code') }}" maxlength="9" >
            @error('code')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="start_date" class="form-label">Ngày bắt đầu:</label>
            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date') }}" >
            @error('start_date')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label">Ngày kết thúc:</label>
            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ old('end_date') }}" >
            @error('end_date')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Mô tả:</label>
            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="pt-4">
            <button type="submit" class="btn btn-primary">Tạo Mới</button>
            <a href="{{ route('admin.promotions.index') }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </form>
@endsection
