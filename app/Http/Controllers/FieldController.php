<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Field;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use App\User;

class FieldController extends Controller
{
    public function saveFields(Request $request)
    {

        $id_event = $request->input('id_event');
        $language = $request->input('language');

        if (empty($id_event) || empty($language)) {
            throw new \Exception('Provide valid parameters');

        }

        try {

            $event_data = '';
            $file_path = app_path() . '/EventDataFiles/' . $id_event . '-' . $language . '.json';
            if (!file_exists($file_path)) {
                throw new \Exception('Matching file not found');
            }
            $json_data = file_get_contents($file_path);
            $data_array = json_decode($json_data, true);

            $formatted_data = array();

            foreach ($data_array['data'] as $key => $value) {
                $formatted_data[] = $value;
            };

            foreach ($formatted_data as $value) {
                $field = new Field;
                $field->id = $value['id'];
                $field->event_id = $value['id_event'];
                $field->type = $value['type'];
                $field->title = $value['title'];
                $field->slug = $value['slug'];
                $field->language = $language;
                $field->values = $value['values'];

                $field->save();
            }

            return response('Successful', 200)
                ->header('Content-Type', 'text/plain');



        } catch (\Exception $e) {

            /*
             * This can be logged like this:
             * Log::error($e);
             */

            echo $e->getMessage();
        }

        return '';
    }

    public function index(Request $request) {
        $id_event = $request->input('id_event');
        $language = $request->input('language');

        if (empty($id_event) || empty($language)) {
            throw new \Exception('Provide valid parameters');

        }


        $fields = Field::where('event_id', $id_event)->where('language', $language)->get();
        return view('index', ['fields' => $fields]);


    }


    public function registration(Request $request)
    {

        $input = $request->all();
        $user = new User;

        $custom_fields = array();

        foreach($input as $key => $value) {
            switch($key) {
                case 'name':
                    $user->name = Input::get('name');
                    break;

                case 'surname':
                    $user->surname = Input::get('surname');
                    break;
                case 'email':
                    $user->email = Input::get('email');
                    break;
                case 'telephone':
                    $user->telephone = Input::get('telephone');
                    break;
                case '_token':
                    break;
                default:
                $custom_fields[$key] = $value;

            }
        }

        $attributes['answer'] = json_encode($custom_fields);
        $attributes['event_id'] = Input::get('event_id');
        $attributes['id'] = substr(md5(sha1(time() . rand())), 0, 6);
        $user->events()->save($user, $attributes);

        return response('Successful', 200)
            ->header('Content-Type', 'text/plain');

    }



}
