<?php

return array_merge($config,
    [
        'plugins' => array_merge( $config['plugins'],
            [
                'MultipleLocalAuth'           => ['namespace' => 'MultipleLocalAuth'],
                'EvaluationMethodSimple'      => ['namespace' => 'EvaluationMethodSimple'],
                'EvaluationMethodDocumentary' => ['namespace' => 'EvaluationMethodDocumentary'],
                'EvaluationMethodTechnical'   => ['namespace' => 'EvaluationMethodTechnical'],
                'AldirBlanc'                  => [
                    'namespace' => 'AldirBlanc',
                    'config' => [
                        'inciso1_enabled' => true,              // indicativo de habilitacao
                        'inciso2_enabled' => true,              // indicativo de habilitacao
                        'project_id' => <num_projeto>           // vinculado ao projeto pai
                        'inciso1_opportunity_id' => <num_oportunidade>,
                        'inciso2_opportunity_ids' => [
                            "Cidade 1" => <num_oportunidade>,
//                            "Cidade 2" => <num_oportunidade>,
//                            "Cidade 3" => <num_oportunidade>,
//                            "Cidade 4" => <num_oportunidade>,
//                            "Cidade 5" => <num_oportunidade>,
//                            "Cidade 6" => <num_oportunidade>,
//                            "Cidade 7" => <num_oportunidade>,
//                            "Cidade 8" => <num_oportunidade>
                        ]
                    ]
            ]
        )
    ]
);
        
