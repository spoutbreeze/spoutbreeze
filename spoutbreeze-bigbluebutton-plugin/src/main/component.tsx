import * as React from 'react';
import { useEffect, useState } from 'react';

import {
  OptionsDropdownOption,
  OptionsDropdownSeparator,
  BbbPluginSdk,
  PluginApi,
  pluginLogger,
} from 'bigbluebutton-html-plugin-sdk';

interface MainComponentProps {
  pluginUuid: string;
}

function MainComponent(
  { pluginUuid: uuid }: MainComponentProps,
): React.ReactElement<MainComponentProps> {
  BbbPluginSdk.initialize(uuid);
  const pluginApi: PluginApi = BbbPluginSdk.getPluginApi(uuid);
  const { data: currentUser } = pluginApi.useCurrentUser();
  const [streaming, setStreaming] = useState(false);

  useEffect(() => {
    if (!currentUser?.presenter) {
      pluginApi.setOptionsDropdownItems([]);
      return;
    }

    pluginApi.setOptionsDropdownItems([
      new OptionsDropdownSeparator(),
      new OptionsDropdownOption({
        label: streaming ? 'Stop stream' : 'Start stream',
        icon: streaming ? 'close' : 'video',
        dataTest: 'spoutbreeze-stream-toggle',
        onClick: () => {
          setStreaming(!streaming);
          pluginLogger.info('spoutbreeze', streaming ? 'stop requested' : 'start requested');
        },
      }),
    ]);
  }, [currentUser, streaming]);

  return null;
}

export default MainComponent;
