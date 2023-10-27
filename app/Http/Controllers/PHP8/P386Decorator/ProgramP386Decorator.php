<?php

namespace App\Http\Controllers\PHP8\P386Decorator;

class ProgramP386Decorator
{
    public function index() {
        $requestData = [
            'user' => 'example_user',
            'action' => 'some_action',
        ];

        $process =
            new AuthenticateRequest(
                new StructureRequest(
                    new LogRequest(
                        new MainProcess()
                    )
                )
            );

        $process->process(new RequestHelper($requestData));
    }
}
