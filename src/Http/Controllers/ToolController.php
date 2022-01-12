<?php

namespace Runline\ProfileTool\Http\Controllers;

use Illuminate\Http\UploadedFile;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class ToolController extends Controller
{

    public function index()
    {
        $fields = [];

        foreach (config('nova-profile-tool.fields') as $field) {

            if (!is_null($field['value'])) {
                $field['value'] = auth()->user()->{$field['value']};
            }

            if (!is_null($field['value']) && $field['component'] == 'file-field') {
                $field['previewUrl'] = Storage::disk('public')->url($field['value']);
                $field['thumbnailUrl'] = Storage::disk('public')->url($field['value']);
            }

            $field['name'] = ucfirst(__("validation.attributes." . $field['attribute']));
            $field['indexName'] = ucfirst(__("validation.attributes." . $field['attribute']));

            $fields[] = $field;
        }

        return response()->json($fields);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function store()
    {
        $validations = config('nova-profile-tool.validations');

        request()->validate($validations);

        $fields = request()->only(array_keys($validations));

        if (empty($fields['password'])) {
            unset($fields['password']);
        } else {
            $fields['password'] = Hash::make($fields['password']);
        }

        foreach ($fields as $key => $field) {
            if ($field instanceof UploadedFile) {
                $path = $field->store('files', 'public');

                $fields[$key] = $path;
            }
        }

        auth()->user()->update($fields);

        return response()->json(__("Your profile has been updated!"));
    }
}
