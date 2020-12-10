@extends(isset(Auth::user()->id) ? 'layouts.admin' : 'layouts.basic')
