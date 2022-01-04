<?php

namespace App\Models;
use Illuminate\Support\Str;

class Gambar extends Model{
	protected $table = 'gambar';
	protected $guarded =['id'];

	function handleUploadSlider1(){
		if(request()->hasFile('slider_1')){
			$slider_1 = request()->file('slider_1');
			$destination = "images/slider";
			$randomStr = Str::random(5);
			$filename = $this->id."-".time()."-".$randomStr."."."1".".".$slider_1->extension();
			$url = $slider_1->storeAs($destination, $filename);
			$this->slider_1 = "app/".$url;
			$this->save;
		}
	}

	function handleUploadSlider2(){
		if(request()->hasFile('slider_2')){
			$slider_2 = request()->file('slider_2');
			$destination = "images/slider";
			$randomStr = Str::random(5);
			$filename = $this->id."-".time()."-".$randomStr."."."2".".".$slider_2->extension();
			$url = $slider_2->storeAs($destination, $filename);
			$this->slider_2 = "app/".$url;
			$this->save;
		}
	}

	function handleUploadSlider3(){
		if(request()->hasFile('slider_3')){
			$slider_3 = request()->file('slider_3');
			$destination = "images/slider";
			$randomStr = Str::random(5);
			$filename = $this->id."-".time()."-".$randomStr."."."3".".".$slider_3->extension();
			$url = $slider_3->storeAs($destination, $filename);
			$this->slider_3 = "app/".$url;
			$this->save;
		}
	}

	function handleDeleteFoto(){
		$slider = $this->slider;
		return true;
	}
}