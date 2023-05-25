# useAxios

## Usage

```code
import useAxios from './hooks/useAxios'

const ThisIsYourComponent = () => {
const [data, isLoading] = useAxios(<URL>);

return
    isLoading ? (
        <p>Loading..</p>
        ) : (
            <STUFF TO RENDER>
        )
}
```
