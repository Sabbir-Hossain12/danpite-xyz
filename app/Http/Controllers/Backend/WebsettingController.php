<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\Websetting;
use Illuminate\Http\Request;

class WebsettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $websetting =Websetting::first();
        return view('backend.content.websetting.index',['websetting'=>$websetting]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Websetting  $websetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $webinfo =Websetting::where('id',$id)->first();
        $webinfo->email=$request->email;
        $webinfo->email_two=$request->email_two;
        $webinfo->phone_one=$request->phone_one;
        $webinfo->phone_two=$request->phone_two;
        $webinfo->address=$request->address;
        if($request->logo){
            $logo = $request->file('logo');
            $name = time() . "_" . $logo->getClientOriginalName();
            $uploadPath = ('public/images/');
            $logo->move($uploadPath, $name);
            $logoImgUrl = $uploadPath . $name;
            $webinfo->logo = $logoImgUrl;
        }
        $webinfo->update();
        return redirect()->back()->with('message','Basic Setting updated successfully');
    }

    public function pixelanalytics(Request $request, $id)
    {
        $webinfo =Websetting::where('id',$id)->first();
        if($request->facebook_pixel){
            $webinfo->facebook_pixel=$request->facebook_pixel;
        }else{
            $webinfo->facebook_pixel='';
        }
        if($request->google_analytics){
            $webinfo->google_analytics=$request->google_analytics;
        }else{
            $webinfo->google_analytics='';
        }
        if($request->marquee_text){
            $webinfo->marquee_text=$request->marquee_text;
        }else{
            $webinfo->marquee_text='';
        }
        if($request->chat_box){
            $webinfo->chat_box=$request->chat_box;
        }else{
            $webinfo->chat_box='';
        }
        if($request->google_map){
            $webinfo->google_map = $request->google_map;
        }else{
            $webinfo->google_map='';
        }
        if($request->news_text){
            $webinfo->news_text=$request->news_text;
        }else{
            $webinfo->news_text='';
        }

        $webinfo->update();
        return redirect()->back()->with('message','Pixel & Analytics updated successfully');
    }

    public function sociallink(Request $request, $id)
    {
        $webinfo =Websetting::where('id',$id)->first();
        if(isset($request->facebook)){
            $webinfo->facebook=$request->facebook;
        }else{
            $webinfo->facebook=null;
        }

        if(isset($request->twitter)){
            $webinfo->twitter=$request->twitter;
        }else{
            $webinfo->twitter=null;
        }

        if(isset($request->google)){
            $webinfo->google=$request->google;
        }else{
            $webinfo->google=null;
        }

        if(isset($request->whatsapp)){
            $webinfo->whatsapp=$request->whatsapp;
        }else{
            $webinfo->whatsapp=null;
        }

        if(isset($request->instagram)){
            $webinfo->instagram=$request->instagram;
        }else{
            $webinfo->instagram=null;
        }

        if(isset($request->pinterest)){
            $webinfo->pinterest=$request->pinterest;
        }else{
            $webinfo->pinterest=null;
        }

        if(isset($request->tiktok)){
            $webinfo->tiktok  =  $request->tiktok;
        }else{
            $webinfo->tiktok  =  null;
        }

        if(isset($request->linkedin)){
            $webinfo->linkedin=$request->linkedin;
        }else{
            $webinfo->linkedin=null;
        }

        if(isset($request->youtube)){
            $webinfo->youtube=$request->youtube;
        }else{
            $webinfo->youtube=null;
        }

        $webinfo->update();
        return redirect()->back()->with('message','Social Links updated successfully');
    }

     public function metainfo(Request $request, $id)
    {
        $webinfo =Websetting::where('id',$id)->first();
        if(isset($request->meta_title)){
            $webinfo->meta_title=$request->meta_title;
        }else{
            $webinfo->meta_title=null;
        }
        if(isset($request->meta_keyword)){
            $webinfo->meta_keyword=$request->meta_keyword;
        }else{
            $webinfo->meta_keyword=null;
        }
        if(isset($request->meta_description)){
            $webinfo->meta_description=$request->meta_description;
        }else{
            $webinfo->meta_description=null;
        }
        $webinfo->update();
        return redirect()->back()->with('message','Meta info updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Websetting  $websetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Websetting $websetting)
    {
        //
    }
}
