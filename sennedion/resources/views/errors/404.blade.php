@extends('errors::minimal')

@section('title', __('Sayfa bulunamadı'))
@section('code', '404')
@section('message',$exception->getMessage());

