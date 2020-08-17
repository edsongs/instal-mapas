<?php

return array_merge($config,
    [
        'plugins' => array_merge( $config['plugins'],
            [
                'AldirBlanc'                  => ['namespace' => 'AldirBlanc'],
                'MultipleLocalAuth'           => ['namespace' => 'MultipleLocalAuth'],
                'EvaluationMethodSimple'      => ['namespace' => 'EvaluationMethodSimple'],
                'EvaluationMethodDocumentary' => ['namespace' => 'EvaluationMethodDocumentary'],
                'EvaluationMethodTechnical'   => ['namespace' => 'EvaluationMethodTechnical']
            ]
        ),
    ]
);