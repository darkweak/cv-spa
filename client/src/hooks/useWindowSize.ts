import { useCallback, useEffect, useState } from 'react';

export const useWindowSize = () => {
    const isClient = typeof window !== 'undefined';

    const getSize = useCallback(() => ({
        width: isClient ? window.innerWidth : undefined,
        height: isClient ? window.innerHeight : undefined
    }), [isClient]);

    const [windowSize, setWindowSize] = useState(getSize);

    useEffect(() => {
        if (!isClient) {
            return;
        }

        function handleResize() {
            setWindowSize(getSize());
        }

        window.addEventListener('resize', handleResize);
        return () => window.removeEventListener('resize', handleResize);
    }, [getSize, isClient]);

    return windowSize;
}
