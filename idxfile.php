<?php

function deploy(Idephix\Context $context, $go = false)
{
    $remoteBaseDir = $context->get('deploy.remote_base_dir');
    $localBaseDir = $context->get('deploy.local_base_dir');
    $extraOpts = ' --exclude-from='.escapeshellarg($context->get('deploy.rsync_exclude'));
    $extraOpts.= $go ? '' : ' --dry-run';
    $remoteConnection = $context->get('ssh_params.user').'@'.$context->currentHost();
    $cmd = "rsync -rlDc --force --delete --progress $extraOpts -e 'ssh' $localBaseDir $remoteConnection:$remoteBaseDir";
    $context->local($cmd);
}
